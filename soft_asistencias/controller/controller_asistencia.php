<?php
    require_once ("model/model_asistencia.php");

    class AsistenciasController {        

        public function formAsistenciaEntradaController(){

			$response = EmpleadosModel::vistaEmpleadosModel("empleados"); ?>

            <form action="" method="post">
            
			<?php foreach((array) $response as $row => $items) { ?>
                <div class="input-group mb-3">
                    <input type="hidden" name="empleado[]" value="<?php echo $items['id']; ?>">
                    <input readonly class="form-control" value="<?php echo $items["primerNombre"]." ".$items["segundoApellido"]; ?>" />

                    <span class="input-group-text">|</span>
                    <select name="asistencia[]" class="form-control">
                        <option value="" selected disabled>-- SELECCIONE --</option>
                        <option value="1">PUNTUAL</option>
                        <option value="2">ATRASO</option>
                        <option value="3">NO ASISTIO</option>
                    </select>
                </div>

                
            <?php }	 ?>
                <button class="btn btn-danger" type="submit" name="procesar">GUARDAR ASISTENCIA</button>
            </form>
        <?php }
        

        /* VISTA  PARA EL MODAL */
        

        public function vistaAsistenciaDiariaController(){

			$response = AsistenciaModel::vistaAsistenciaModel("asist_entrada");

            echo '<table class="table table-striped table-hover display" id="example" style="width:100%">

            <thead>

            <tr>
                <th>FECHA</th>
                <th></th>
            </tr>

            </thead>
            <tbody>';			

			foreach((array) $response as $row => $items) {             

				echo '<tr>

						<td>'.$items['fecha'].'</td>

                        <td><a href="model/pdf/pdfAsistencias.php?argments='.$items['fecha'].'" target="_blank"><button class="btn btn-outline-success btn-sm">
                            <i class="fa fa-eye"></i> VER ASISTENCIA</button> </a></td>

                    </tr>';

			}

            echo '</tbody>

                    </table>';

		}

        //  S A L I D A

        public function formAsistenciaSalidaController(){

			$response = EmpleadosModel::vistaEmpleadosModel("empleados"); ?>

            <form action="" method="post">
            
			<?php foreach((array) $response as $row => $items) { ?>
                <div class="input-group mb-3">
                    <input type="hidden" name="empleado[]" value="<?php echo $items['id']; ?>">
                    <input readonly class="form-control" value="<?php echo $items["primerNombre"]." ".$items["segundoApellido"]; ?>" />

                    <span class="input-group-text">|</span>
                    <select name="asistencia[]" class="form-control">
                        <option value="" selected disabled>-- SELECCIONE --</option>
                        <option value="1">PUNTUAL</option>
                        <option value="2">TARDE</option>
                        <option value="3">ANTES DE HORA CON PERMISO</option>
                        <option value="4">ANTES DE HORA SIN PERMISO</option>
                    </select>
                </div>

                
            <?php }	 ?>
                <button class="btn btn-warning" type="submit" name="salida">GUARDAR ASISTENCIA</button>
            </form>
        <?php }

        public function vistaSalidaDiariaController(){

			$response = AsistenciaModel::vistaSalidaModel("asist_salida");

            echo '<table class="table table-striped table-hover display" id="example" style="width:100%">

            <thead>

            <tr>
                <th>FECHA</th>
                <th></th>
            </tr>

            </thead>
            <tbody>';			

			foreach((array) $response as $row => $items) {             

				echo '<tr>

						<td>'.$items['fecha'].'</td>

                        <td><a href="model/pdf/pdfSalidas.php?argments='.$items['fecha'].'" target="_blank"><button class="btn btn-outline-success btn-sm">
                            <i class="fa fa-eye"></i> VER SALIDA</button> </a></td>

                    </tr>';

			}

            echo '</tbody>

                    </table>';

		}

    }