<?php

    require_once ("model/model_administracion.php");
    
    class AdministracionController {
        public function viewLogoNameController() {

            $response = AdministracionModel::viewLogoNameModel($datosController, "empresa");
                foreach((array) $response as $del) { ?>
                    <a class="navbar-brand" href="index.php">
                        <img src="data:image/jpg;base64, <?php echo base64_encode($del['logo']) ?>" />
                         <?php echo $del["nombre"] ?></a>
                <?php }
        }
        
        public function cambiarClaveController() {
            if(isset($_POST["original"])){
				$datosController = array(
                                        "idem"  => $_POST["laid"],
                                        "ori"	=> $_POST["original"],
                                        "cla"	=> $_POST["nueva_clave"],
										"rcla" 	=> $_POST["rnueva_clave"]);

				$response = AdministracionModel::cambiarClaveModel($datosController, "usuarios");
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
        
        public function cambiarLogoController() {
            if(isset($_FILES["img"])){
				$datosController = array(
                                        "idem"  => $_POST["laid"],
                                        "logo"	=> addslashes(file_get_contents($_FILES['img']['tmp_name'])));

				$response = AdministracionModel::cambiarLogoModel($datosController, "empresa");
				if ($response == "success") {
                    echo "<div class='alert alert-success'>
                            <p><b> Logo cambiado correctamente.</b></p>
                          </div>";
				}else{
					echo "<div class='alert alert-danger'>
                            <p><b> Error al cambiar el logo.</b></p>
                          </div>";
				}
			}
        }
    }