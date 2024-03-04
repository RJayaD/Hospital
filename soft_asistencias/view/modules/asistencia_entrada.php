<?php
    @session_start();
    $user = @$_SESSION["usuario"];
    if (!isset($user)) {
        //header('location: log.php');
        echo '<script>
                window.location.href = "log";
              </script>';

    }else{
        require_once ('model/class_cc.php');
        $args = new Conexion();
        $db = $args->conectar();

        require_once ("controller/controller_asistencia.php");
        $view = new AsistenciasController;
        $fechaActual = date('Y-m-d');


        if(isset($_POST["procesar"])){

            $items1 = ($_POST["empleado"]);
            $items2 = ($_POST["asistencia"]);

            while(true){
                $item1 = current($items1);
                $item2 = current($items2);

                // ASIGNAR A VARIABLES

                $empleadosId = (($item1 !== false) ? $item1 : ", $nbsp;");
                $asistenciaType = (($item2 !== false) ? $item2 : ", $nbsp;");

                // CONCATENAR

                $valores = '('.$empleadosId.',"'.$asistenciaType.'"),';
                $valoresQ = substr($valores, 0, -1);
                // COPIA CADA FILA
                $stmt = $db->prepare("INSERT INTO asist_entrada (empleadoId, tipoId) 
                                            VALUES $valoresQ ");
                $stmt->execute();

                $item1 = next($items1);
                $item2 = next($items2);

                // Check Terminator
                if($item1 === false && $item2 === false) break;
                
            }

            echo '<script>
                        alert("ASISTENCIA GUARDADA CORRECTAMENTE!!!");
                        window.location.href = "empleados";
                      </script>';
        }

        // VERIFICAR SI YA SE TOMO LA ASISTENCIA DEL DIA ACTUAL
        $verify = $db->prepare("SELECT * FROM asist_entrada WHERE fecha='$fechaActual' AND id_estado = 1");
        $verify->execute();
        $count = $verify->rowCount();

        // VERIFICAR LA ASISTENCIA DE LOS ULTIMOS 7 DIAS
        $sqlweek = $db->prepare("select distinct fecha
                                        from asist_entrada where
                                        fecha <= NOW() AND fecha >= date_add(NOW(), INTERVAL -7 DAY)");
        $sqlweek->execute();
        $allsqlweek = $sqlweek->fetchAll();
?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="alert alert-dark">
            <h4><i class="fa fa-th-list"></i> ASISTENCIA DE ENTRADA </h4><hr />

        </div>
    </div>
</div>

<div class="row mt-5">

    <div class="col-sm-7 col-md-7 col-lg-7" style="height:100%">
        <div class="card border-shadow">
            <div class="card-header">LISTA DE ASISTENCIAS</div>
            <div class="card-body">
            <?php $view->vistaAsistenciaDiariaController(); ?>
            </div>
        </div>
    </div>

    <div class="col-sm-5 col-md-5 col-lg-5" style="height:100%">
        <div class="card border-shadow">
        <div class="card-header">ASISTENCIA ACTUAL</div>
            <div class="card-body">
            <?php 
                if($count > 0){
                    echo 'YA SE HA GENERADO LA ASISTENCIA DEL DIA ACTUAL';
                    echo '<br />';
                    echo '<k>Para ver el reporte de la asistencia de hoy, <a href="model/pdf/pdfAsistencias.php?argments='.$fechaActual.'" target="_blank"> haga click aqui</a></k>';
                }else{
                    $view->formAsistenciaEntradaController();
                }

                ?>
                
            </div>
        </div>
    </div>
</div>
    <div class="row mt-5">
    <div class="card border-shadow-lg">
        <div class="card-header">ASISTENCIA SEMANAL</div>
            <div class="card-body">
            <table class="table table-striped table-hover display" id="example" style="width:100%">

            <thead>

                <tr>
                    <th>FECHA</th>
                    <th></th>
                </tr>

            </thead>
            <tbody>	

            <?php foreach((array) $allsqlweek as $row => $items) {          ?>    

                <tr>

                    <td><?php echo $items['fecha']; ?></td>
                    <td><a href="model/pdf/pdfAsistencias.php?argments=<?php echo $items['fecha']; ?>" target="_blank">
                        <button class="btn btn-outline-info btn-sm">
                    <i class="fa fa-eye"></i> VER ASISTENCIA</button> </a></td>

                </tr>

            <?php } ?>

            </tbody>

        </table>
                
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>
</div>

<div class="row"></div>
<div style="clear: both;"></div>
<?php } ?>
