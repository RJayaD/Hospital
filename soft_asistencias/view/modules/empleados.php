<?php
    @session_start();
    $user = @$_SESSION["usuario"];
    if (!isset($user)) {
        //header('location: log.php');
        echo '<script>
                window.location.href = "log";
              </script>';

    }else{
        require_once ("controller/controller_empleados.php");
        $view = new EmpleadosController;
        $view->registroEmpleadosController();
?>

<div class="col-12">
        <div class="alert alert-primary">
            <h4><i class="fa fa-th-list"></i> Lista de Empleados </h4><hr />
        </div>        
</div>

<div class="d-flex justify-content-between">
<a href="empleados_nuevo">Nuevo</a>
    <div><a href="model/pdf/pdfEmpleados.php" target="_blank">VER REPORTE</a></div>
</div>

<div class="row mt-5">
<div class="col-sm-12 col-md-12 col-lg-12" style="height:100%">
        <?php $view->vistaEmpleadosController(); ?>
    </div>
</div>

    <div style="clear: both;"></div>
</div>
</div>




<div class="row"></div>
<div style="clear: both;"></div>
<?php } ?>

