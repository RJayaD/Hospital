<?php
    @session_start();
    $user = $_SESSION["usuario"];
    if (!isset($user)) {
        echo '<script>
                window.location.href = "log";
              </script>';

    }else{
    require_once ("controller/controller_empleados.php");
    $view = new EmpleadosController();
    $view->registroEmpleadosController();
    
?>

<div class="row">
    <div class="col-sm-12 col-md-12  col-lg-12">
        <div class="alert alert-primary">
            <h4><i class="fa fa-th-list"></i> Nuevo </h4><hr />
            <a href="empleados">Volver</a>
        </div>

    </div>

    <div class="col-sm-5 col-md-5 col-lg-5 mx-auto">
        <form method="post">
            <div class="mb-3">
                <label for="" class="form-label">Cédula</label>
                <input type="" name="cedula" class="form-control" onkeypress="return isNumberKey(event)" maxlenght=10>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Primer Nombre</label>
                <input type="" name="nombres1" class="form-control" onkeypress="return ValidAlphabet()">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Segundo Nombre</label>
                <input type="" name="nombres2" class="form-control" onkeypress="return ValidAlphabet()">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Primer Apellido</label>
                <input type="" name="apellidos1" class="form-control" onkeypress="return ValidAlphabet()">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Segundo Apellido</label>
                <input type="" name="apellidos2" class="form-control" onkeypress="return ValidAlphabet()">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Correo Electronico</label>
                <input type="email" name="correo" class="form-control">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Telefono </label>
                <input type="" name="telf1" class="form-control" onkeypress="return isNumberKey(event)">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Fecha Nacimiento</label>
                <input type="date" name="fnac" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Dirección</label>
                <input type="" name="dir" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Agregar Nuevo</button>

        
    </div>  

    <div style="clear: both;"></div>
</div>

<div class="row"></div>
<div style="clear: both;"></div>
<?php } ?>

