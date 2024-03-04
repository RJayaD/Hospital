<?php
    require_once ("class_cc.php");

    class EmpleadosModel {
        public static function registroEmpleadosModel($datosController, $tabla) {
            // Validar usuario repetido
            $send = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cedula=:ci");
            $send->bindParam(':ci', $datosController["ci"], PDO::PARAM_STR);
            $send->execute();
            $count = $send->rowCount();
            $estado = 1;

            if ($count == 0) {
            
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
                                (cedula, primerNombre, segundoNombre, primerApellido, segundoApellido, correo, fecha_nac, telefono, direccion, id_estado) VALUES 
                                    (:ci, :nom1, :nom2, :ape1, :ape2, :ema, :nac, :t1, :dir, :st)");
                $stmt->bindParam(":ci", $datosController["ci"],      PDO::PARAM_STR);
                $stmt->bindParam(":nom1", $datosController["nombres1"],    PDO::PARAM_STR);
                $stmt->bindParam(":nom2", $datosController["nombres2"],    PDO::PARAM_STR);
                $stmt->bindParam(":ape1", $datosController["apellidos1"],      PDO::PARAM_STR);
                $stmt->bindParam(":ape2", $datosController["apellidos2"],      PDO::PARAM_STR);
                $stmt->bindParam(":ema", $datosController["correo"],     PDO::PARAM_STR);
                $stmt->bindParam(":nac", $datosController["fnac"],      PDO::PARAM_STR);
                $stmt->bindParam(":t1", $datosController["telf1"],      PDO::PARAM_STR);
                $stmt->bindParam(":dir", $datosController["direccion"],     PDO::PARAM_STR);                
                $stmt->bindParam(":st", $estado,      PDO::PARAM_INT);

                if($stmt->execute()) {                    
                    return "success";
                }else{
                    return "Error";
                }
            }else{
                return "Error";
            }
            
        }
        
        public static function vistaEmpleadosModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_estado = 1 ORDER BY id ASC");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }
        
        /** EDITAR EMPLEADO MODEL */

        public static function editarEmpleadosModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }       
        

        /** ACTUALIZAR DATOS DEL EMPLEADO MODEL */

        public static function actualizarEmpleadosModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                                                                cedula=:cedula, 
                                                                primerNombre=:nombres1,
                                                                segundoNombre=:nombres2,
                                                                primerApellido=:apellido1,
                                                                segundoApellido=:apellido2,
                                                                correo=:correo,
                                                                fecha_nac = :fnac,
                                                                telefono=:telf2,
                                                                direccion=:direccion 
                                                    WHERE id=:id");

            $stmt->bindParam(':cedula', $datosController['cedula'], PDO::PARAM_STR);
            $stmt->bindParam(':nombres1', $datosController['nombres1'], PDO::PARAM_STR);
            $stmt->bindParam(':nombres2', $datosController['nombres2'], PDO::PARAM_STR);
            $stmt->bindParam(':apellido1', $datosController['apellidos1'], PDO::PARAM_STR);
            $stmt->bindParam(':apellido2', $datosController['apellidos2'], PDO::PARAM_STR);
            $stmt->bindParam(':correo', $datosController['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':fnac', $datosController['fnac'], PDO::PARAM_STR);
            $stmt->bindParam(':telf2', $datosController['telf1'], PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $datosController['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){                
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }
        
        /** ELIMINAR EMPLEADO MODEL */

        public static function eliminarFormEmpleadosModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }       
        

        /** ACTUALIZAR DATOS DEL EMPLEADO MODEL */

        public static function eliminarEmpleadosModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_estado = 2 WHERE id=:id");
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){                
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }
           
    }