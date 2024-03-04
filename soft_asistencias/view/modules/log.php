<div class="container-fluid" >
	<div class="row">
		<div class="col-md-4 mx-auto"><br><br>
			<h1 align="center" class="mt-4">Iniciar Sesión</h1>
	<form method="post">
      <div class="mb-3">
	    <label>Tipo de Usuarios</label>
	    <select class="form-control" name="tipo">
            <option value="1">Administrador</option>
            <!--<option value="2">Usuario</option>-->
            
        </select>
	    <!--<small class="form-text text-muted">We'll never share your email with anyone else.</small>-->
	  </div>
	  <div class="mb-3">
	    <label>Correo Electrónico</label>
	    <input type="text" class="form-control" name="email" placeholder="Enter email" value="rjaya@outlook.com">
	    <!--<small class="form-text text-muted">We'll never share your email with anyone else.</small>-->
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="passw" class="form-control" placeholder="Password" />
	  </div>

	  <button type="submit" class="btn btn-primary" >INICIAR SESIÓN</button>
	  <!--<div class="alert alert-danger mt-4">
	  	<center><a href="reg.php" class="text-dark" style="font-weight: bold">Registrarse aquí</a></center>
	  </div>-->


	</form>

	<?php
    $register = new MvcController();
    $register->ingresoUsuarioController();

    if (isset($_GET["action"])){
        if ($_GET["action"] == "fail"){
            echo "<div class='alert alert-warning'>Fallo al entrar al sistema, compruebe los datos.</div>";
		}
		
		if ($_GET["action"] == "fail3"){
            echo "<div class='alert alert-danger'>Ha fallado 3 veces</div>";
        }
    }

?>
</div>
</div>
</div>

