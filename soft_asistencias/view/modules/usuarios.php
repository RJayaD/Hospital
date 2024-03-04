<?php 
    if (!$_SESSION["validar"] == true) {
        header("Location: log");
        exit();
      }

$view = new MvcController; 
$view->registroUsuarioController();

    if (isset($_GET["action"])){
        if ($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }

        if ($_GET["action"] == "cambio"){
            echo "Actualizado correctamente";
        }
    }
 ?>
<div class="row">
    <div class="col-sm-12 col-md-12"><h2>Usuarios</h2></div>
    <div class="col-sm-4 col-md-4">
        <form method="post" onSubmit="return validarRegistro();">
        <div class="form-group">
            <label for="usuarioLabel">Usuario: <span></span></label>
            <input type="text" name="usuario" class="form-control" id="usuario" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="passwLabel">Password:</label>
            <input type="password" name="passw" class="form-control" id="passw" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="emailLabel">Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <label for="termLabel"></label>
        <p style="text-align:center"><input type="checkbox" id="terminos" /><a href="#">Acepta terminos y condiciones</a> </p>

        <input type="submit" value="Enviar" class="btn btn-success">
    </form>
    </div>

    <div class="col-sm-8 col-md-8">
        <table class="table table-striped table-hover">
            <thead>
                <th>#</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Fecha Registro</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>

            <tbody>
                <?php
                    $view->vistaUsuarioController();
                    $view->borrarUsuarioController();
                ?>
            </tbody>
        </table>
    </div>
</div>
