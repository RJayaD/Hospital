<?php
    require_once ("model/model_empleados.php");

    class EmpleadosController {

        public function registroEmpleadosController() {

			if(isset($_POST["cedula"])){

				$datosController = array(

										 "ci" 	=> $_POST["cedula"],

										 "nombres1" 	=> $_POST["nombres1"],
                                         "nombres2" 	=> $_POST["nombres2"],                    
										 "apellidos1" 	=> $_POST["apellidos1"],
                                         "apellidos2" 	=> $_POST["apellidos2"],
                                         "correo" 	    => $_POST["correo"],
                                         "telf1" 	    => $_POST["telf1"],
                                         "fnac" 	    => $_POST["fnac"],
                                         "direccion" 	=> $_POST["dir"]);



				$response = EmpleadosModel::registroEmpleadosModel($datosController, "empleados");

				if ($response == "success") {

                    echo "<div class='alert alert-success'>

                            <p><b><i class='fa fa-check'></i> Registrado Correctamente.</b></p>

                          </div>";

				}else{

					echo "<div class='alert alert-danger'>

                            <p><b> Error al registrar.</b></p>

                          </div>";

				}

			}

		}
        

        public function vistaEmpleadosController(){

			$response = EmpleadosModel::vistaEmpleadosModel("empleados");      ?>       

            <table class="table table-striped table-condensed table-hover display" id="example" style="width:100%; height:100%; background:ghostwhite">


            <thead>

                <tr>

                    <th>C.I</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>E-MAIL</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th></th>
                    <th></th>

                </tr>

            </thead>

            <tbody>		

			<?php foreach((array) $response as $row => $items) { ?>
				<tr>
                        <td><?php echo $items["cedula"]; ?></td>
						<td><?php echo $items["primerNombre"]." ".$items["segundoNombre"]; ?></td>
                        <td><?php echo $items["primerApellido"]." ".$items["segundoApellido"]; ?></td>
						<td><?php echo $items["correo"]; ?></td>
                        <td><?php echo $items["fecha_nac"]; ?></td>
                        <td><?php echo $items["telefono"]; ?></td>
                        <td><?php echo $items["direccion"]; ?></td>
                      
                        <td><a href="index.php?action=empleados_upd&id=<?php echo $items["id"]; ?>">
                            <span class="btn btn-outline-info btn-sm"><i class="fa fa-pencil"></i> Editar</span></a></td>
                        <td><a href="index.php?action=empleados_del&id=<?php echo $items["id"]; ?>">
                            <span class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i> Eliminar</span></a></td>
                    
                    </tr>
            <?php } ?>

            </tbody>


    </table>

<?php		}


		public function actualizarEmpleadosController(){

			if (isset($_POST['idEditar'])){

				$datosController = array(	"id" 		=> $_POST["idEditar"],

											"cedula"	=> $_POST["cedula"],

											"nombres1" 	=> $_POST['nombres1'],
                                            "nombres2" 	=> $_POST['nombres2'],

                                            "apellidos1" => $_POST['apellidos1'],
                                            "apellidos2" => $_POST['apellidos2'],
                                            "correo" 	=> $_POST['correo'],
                                            "fnac" 	=> $_POST['fnac'],
                                            "telf1" 	=> $_POST['telf1'],

              

                                            "direccion" => $_POST['direccion']);

				$response = EmpleadosModel::actualizarEmpleadosModel($datosController, "empleados");

				if ($response == "success") {

					echo "<div class='alert alert-info'>

                            <p><b><i class='fa fa-check'></i> Edici&oacute;n realizada correctamente.</b></p>

                          </div>";

				}else{

					echo "Error";

				}

			}

		}

        

        

        /** EDITAR INFORMACION DE LOS EMPLEADOS */

		public function editarEmpleadosController(){

			$datosController = $_GET['id'];

			$response = EmpleadosModel::editarEmpleadosModel($datosController, "empleados");           

			echo '

                    <input type="hidden" name="idEditar" class="form-control" value="'.$response['id'].'">

                    <div class="mb-3">

						<label>Cédula:</label>

						<input type="text" name="cedula" class="form-control" value="'.$response['cedula'].'" onkeypress="return isNumberKey(event)" />

					</div>

                    <div class="mb-3">

						<label>Nombres:</label>

						<input type="text" name="nombres1" class="form-control" value="'.$response['primerNombre'].'" onkeypress="return ValidAlphabet()" />

					</div>

                    <div class="mb-3">

						<label>Nombres:</label>

						<input type="text" name="nombres2" class="form-control" value="'.$response['segundoNombre'].'" onkeypress="return ValidAlphabet()" />

					</div>

                    <div class="mb-3">

						<label>Primer Apellido:</label>

						<input type="text" name="apellidos1" class="form-control" value="'.$response['primerApellido'].'" onkeypress="return ValidAlphabet()" />

					</div>

                    <div class="mb-3">

						<label>Segundo Apellido:</label>

						<input type="text" name="apellidos2" class="form-control" value="'.$response['segundoApellido'].'" onkeypress="return ValidAlphabet()" />

					</div>

                    <div class="mb-3">

						<label>Correo Electrónico:</label>

						<input type="email" name="correo" class="form-control" value="'.$response['correo'].'">

					</div>

                    

                    <div class="mb-3">

						<label>Tel&eacute;fono 1:</label>

						<input type="text" name="telf1" class="form-control" value="'.$response['telefono'].'" onkeypress="return isNumberKey(event)" />

					</div>

                    <div class="mb-3">

                    <label>Fecha Nacimiento:</label>

                    <input type="date" name="fnac" class="form-control" value="'.$response['fecha_nac'].'">

                </div>
                    <div class="mb-3">

						<label>Dirección</label>

						<input type="text" name="direccion" class="form-control" value="'.$response['direccion'].'">

					</div>
				

					<button type="submit" class="btn btn-outline-info"><i class="fa fa-pencil"></i> Actualizar Información Ahora</button>

					<span><a class="btn btn-outline-warning" style="float: right" href="empleados"><i class="fa fa-reply"></i> Volver</a></span>';				

		}

        

        

        /** ELIMINAR EMPLEADO **/

        

        public function eliminarFormEmpleadosController(){

			$datosController = $_GET['id'];

			$response = EmpleadosModel::eliminarFormEmpleadosModel($datosController, "empleados");            

            

			echo '

                    <input type="hidden" name="idEditar" class="form-control" value="'.$response['id'].'">

                    <div class="mb-3">

						<label>Cédula:</label>

						<input type="text" name="cedula" class="form-control" value="'.$response['cedula'].'" readonly>

					</div>

                    <div class="mb-3">

						<label>Nombres:</label>

						<input type="text" name="nombres" class="form-control" value="'.$response['primerNombre'].'" readonly>

					</div>

                    

                    <div class="mb-3">

						<label>Apellidos:</label>

						<input type="text" name="apellidos" class="form-control" value="'.$response['primerApellido'].'" readonly>

					</div>

				

					<button type="submit" class="btn btn-outline-danger"><i class="fa fa-pencil"></i> Eliminar Información Ahora</button>

					<span><a class="btn btn-outline-warning" style="float: right" href="empleados"><i class="fa fa-reply"></i> Volver</a></span>';				

		}

        

        public function eliminarEmpleadosController(){

			if (isset($_POST['idEditar'])){

				$datosController = array(	"id" 		=> $_POST["idEditar"]);

				$response = EmpleadosModel::eliminarEmpleadosModel($datosController, "empleados");

				if ($response == "success") {

					echo "<div class='alert alert-danger'>

                            <p><b><i class='fa fa-check'></i> Eliminación realizada correctamente.</b></p>

                          </div>";

				}else{

					echo "Error";

				}

			}

		}

        

        /** MODAL EMPLEADO */

                

        public function modalEmpleados() {

            echo '<div class="modal-body">



        <div class="form-row">

            <label for="cedulaLabel" class="col-md-4">Cédula (*)</label>

            <div class="form-group col-md-8">                

                <input type="text" name="cedula" class="form-control" onkeypress="return numeros(event)" placeholder="Cédula.." id="cedula" autocomplete="off" required>

            </div>

        </div>

        <div class="form-row">

            <label for="" class="col-md-4">Nombres (*)</label>

            <div class="form-group col-md-8">                

                <input type="text" name="nombres" class="form-control" onkeypress="return caracteres(event)" placeholder="Nombres.." id="passw" autocomplete="off" required>

            </div>

        </div>

        

        <div class="form-row">

            <label for="" class="col-md-4">Apellidos (*)

            </label>

            <div class="form-group col-md-8">

                <input type="text" name="apellidos" class="form-control" onkeypress="return caracteres(event)" placeholder="Apellidos.." id="passw" autocomplete="off" required>

            </div>

        </div>

        

        <div class="form-row">

            <label for="" class="col-md-4">Correo Electrónico:</label>

            <div class="form-group col-md-8">

                <input type="text" name="correo" class="form-control" placeholder="E-mail.." id="passw" autocomplete="off">

            </div>

        </div>

        

        

        <div class="form-row">

            <label for="" class="col-md-4">Teléfono 1:</label>

            <div class="form-group col-md-8">

                <input type="text" name="telf1" class="form-control"  autocomplete="off" >

            </div>

        </div>

        

        <div class="form-row">

            <label for="" class="col-md-4">Teléfono 2:</label>

            <div class="form-group col-md-8">

                <input type="text" name="telf2" class="form-control"  autocomplete="off">

            </div>

        </div>

        

        <div class="form-row">

            <label for="" class="col-md-4">Direcci&oacute;n:</label>

            <div class="form-group col-md-8">

                <input type="text" name="dir" class="form-control"  autocomplete="off">

            </div>

        </div>

    

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Registrar Cuenta</button>

      </div>';

        }

    }