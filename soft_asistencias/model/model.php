<?php 

	class EnlacesPaginas {

		public static function EnlacesPaginasModel($enlacesModel) {
			if (                  

				 $enlacesModel == "empleados" || 
				 $enlacesModel == "empleados_nuevo" ||
				 $enlacesModel == "empleados_upd" ||
				 $enlacesModel == "empleados_del" ||

				 $enlacesModel == "asistencia_entrada" ||
				 $enlacesModel == "asistencia_salida" ||
                                  
				 $enlacesModel == "log" ) {
			
				$module = "view/modules/".$enlacesModel . ".php";

			} else if ($enlacesModel == "index") {
				$module = "view/modules/log.php";

			} else if ($enlacesModel == "ok"){
				$module = "view/modules/empleados.php";
				
			}else if($enlacesModel == "fail") {
				$module = "view/modules/log.php";

			}else if($enlacesModel == "fail3") {
				$module = "view/modules/log.php";

			}else if ($enlacesModel == "cambio"){
				$module = "view/modules/log.php";

			}else {
				$module = "view/modules/log.php";
			}

			return $module;
		}
	}