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


        if(isset($_POST["salida"])){

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
                $stmt = $db->prepare("INSERT INTO asist_salida (empleadoId, tipoId) 
                                            VALUES $valoresQ ");
                $stmt->execute();

                $item1 = next($items1);
                $item2 = next($items2);

                // Check Terminator
                if($item1 === false && $item2 === false) break;

                
            }

            echo '<script>
                        alert("SALIDA GUARDADA CORRECTAMENTE!!!");
                        window.location.href = "empleados";
                      </script>';
        }

    // VERIFICAR SI YA SE TOMO LA ASISTENCIA DEL DIA ACTUAL
    $verify = $db->prepare("SELECT * FROM asist_salida WHERE fecha='$fechaActual' AND id_estado = 1");
    $verify->execute();
    $count = $verify->rowCount();
?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="alert alert-warning">
            <h4><i class="fa fa-th-list"></i> SALIDA </h4><hr />

        </div>
    </div>

    <div class="col-sm-7 col-md-7 col-lg-7" style="height:100%">
        <div class="card border-shadow">
            <div class="card-header">LISTA DE SALIDAS</div>
            <div class="card-body">
            <?php $view->vistaSalidaDiariaController(); ?>
            </div>
        </div>
    </div>

    <div class="col-sm-5 col-md-5 col-lg-5" style="height:100%">
        <div class="card border-shadow">
        <div class="card-header">SALIDA DEL DIA DE HOY</div>
            <div class="card-body">

            <?php 
                if($count > 0){
                    echo 'YA SE HA GENERADO LA SALIDA DEL DIA ACTUAL';
                    echo '<br />';
                    echo '<k>Para ver el reporte de la salida de hoy, <a href="model/pdf/pdfSalidas.php?argments='.$fechaActual.'" target="_blank"> haga click aqui</a></k>';
                }else{
                    $view->formAsistenciaSalidaController();
                }

                ?>
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>
</div>

<div class="row"></div>
<div style="clear: both;"></div>
<?php } ?>
