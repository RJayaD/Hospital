<?php
	require_once ("model/model_usuario.php");
	class MvcController {
		public function plantilla() {
			include "view/template.php";
		}

		# Enlazar paginas en plantilla origen
		public function enlacesPaginasController() {
			if ( isset($_GET['action']) ) {
				$enlaceController = $_GET['action'];
			} else{
				$enlaceController = "log";
			}

			$respuesta = EnlacesPaginas::EnlacesPaginasModel($enlaceController);

			include $respuesta;
		}

		public function registroUsuarioController() {
			if(isset($_POST["usuario"])){
				$datosController = array("usuario"	=> $_POST["usuario"],
										 "passw" 	=> $_POST["passw"],
										 "email" 	=> $_POST["email"]);

				$response = Data::registroUsuarioModel($datosController, "usuarios");
				if ($response == "success") {
					echo 'Grabado';
				}else{
					echo 'NO Grabado';
				}
			}
		}

		

		public function ingresoUsuarioController() {
			if(isset($_POST["email"])) {
				$datosController = array("email" => $_POST["email"],
										 "passw" => $_POST["passw"],
                                         "tipo" => $_POST["tipo"]);

				$response = Data::ingresoUsuarioModel($datosController, "usuarios");


					if(@$response["correo"] == @$_POST["email"] && @$response["clave"] == $_POST["passw"]){

						@session_start();
						$_SESSION["validar"] = true;
						$_SESSION["usuario"] = $response["usuario"];
                        $_SESSION["tipo"] = $_POST["tipo"];
                        $_SESSION["passw"] = $_POST["passw"];
                        $_SESSION["laid"] = $response["id"];
						
                        $space = $_POST['tipo'];
                        switch ($space) {
                            case 1:
                                echo '<script>window.location.href="empleados";</script>';
                                break;
                                
                            case 2:
                                echo '<script>window.location.href="log";</script>';
                                break;       
                        }
                        
						
					}else{
						echo '<script>window.location.href="fail";</script>';
					}
			}
		}

		

		public function vistaUsuarioController(){
			$response = Data::vistaUsuarioModel("usuarios");			
			
			foreach((array) $response as $row => $items) {
				echo '<tr>
						<td>'.$items['id'].'</td>
						<td>'.$items['usuario'].'</td>
						<td>'.$items['email'].'</td>
						<td>'.$items['fecha'].'</td>
						<td><a href="index.php?action=editar&id='.$items['id'].'"><button>Editar</button></a></td>
						<td><a href="index.php?action=usuarios&idBorrar='.$items['id'].'"><button>Eliminar</button></a></td>
					  </tr>';
			}
		}

		/*  EDITAR USUARIO  */

		public function editarUsuarioController(){
			$datosController = $_GET['id'];
			$response = Data::editarUsuarioModel($datosController, "usuarios");
			echo '<div class="form-group">
						<label>Usuario:</label>
						<input type="hidden" name="idEditar" class="form-control" value="'.$response['id'].'">
						<input type="text" name="usuarioEditar" class="form-control" value="'.$response['usuario'].'">
					</div>
				
					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="emailEditar" class="form-control" value="'.$response['email'].'">
					</div>
				
					<input type="submit" value="Actualizar" class="btn btn-info">';
					
		}

		

		/** ACTUALIZAR DATOS DEL USUARIO */

		public function actualizarUsuarioController(){
			if (isset($_POST['usuarioEditar'])){
				$datosController = array(	"id" 		=> $_POST["idEditar"],
											"usuario"	=> $_POST["usuarioEditar"],
											"email" 	=> $_POST['emailEditar']);
				$response = Data::actualizarUsuarioModel($datosController, "usuarios");
				if ($response == "success") {
					header("Location: cambio");
				}else{
					echo "Error";
				}
			}
		}

		/** BORRAR USUARIO CONTROLLER */

		public function borrarUsuarioController(){
			if (isset($_GET["idBorrar"])) {
				$datosController = $_GET["idBorrar"];

				$response = Data::borrarUsuarioModel($datosController, "usuarios");
				if ($response == "success") {
					echo '<script>window.location.href="usuarios";</script>';
				}
			}
		}

		/** AJAX - VALIDAR USUARIO CONTROLLER */

		public function validarUsuarioController($validate) {
			$datosController = $validate;
			$response = Data::validarUsuarioModel($datosController, "usuarios");
			if (count($response["usuario"]) > 0 ){
				echo 0;
			}else{
				echo 1;
			}
		}
        
        public function cambiarClaveController() {
            if(isset($_POST["original"])){
				$datosController = array(
                                        "idem"  => $_POST["laid"],
                                        "ori"	=> $_POST["original"],
                                        "cla"	=> $_POST["nueva_clave"],
										"rcla" 	=> $_POST["rnueva_clave"]);

				$response = Data::cambiarClaveModel($datosController, "usuarios");
				if ($response == "success") {
                    echo "<div class='alert alert-success'>
                            <p><b> Clave cambiada correctamente.</b></p>
                          </div>";
				}else{
					echo "<div class='alert alert-danger'>
                            <p><b> Error al cambiar la clave, compruebe los datos.</b></p>
                          </div>";
				}
			}
        } 
        

	}