<?php
    //session_start();
    $user = $_SESSION["usuario"];
    if (!isset($user)) {
        //header('location: log.php');
        echo '<script>
                window.location.href = "log";
              </script>';

    }else{

    require_once ("controller/controller_empleados.php");
    $register = new EmpleadosController();
    $register->eliminarEmpleadosController();

?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-info">
            <h4 align="center"><i class="fa fa-pencil"></i> Eliminar información</h4>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 mx-auto">
        <form method="post">
            <?php $register->eliminarFormEmpleadosController(); ?>
        </form>
    </div>
</div>
<?php } ?>