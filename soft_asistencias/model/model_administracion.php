<?php
    require_once ("class_cc.php");

    class AdministracionModel {
        
        public static function viewLogoNameModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(); 
            
            $stmt->close();
        }
        
        public static function cambiarClaveModel($datosController, $tabla){
            $send = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id AND passw=:passw");
            $send->bindParam(':passw', $datosController["ori"], PDO::PARAM_STR);
            $send->bindParam(':id', $datosController["idem"], PDO::PARAM_INT);
            $send->execute();
            $count = $send->rowCount();
            
            if ($count > 0) {
                if ($datosController["cla"] == $datosController["rcla"]){
                    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET passw=:nclave WHERE id=:id");
                    $stmt->bindParam(':nclave', $datosController["cla"], PDO::PARAM_STR);
                    $stmt->bindParam(':id', $datosController["idem"], PDO::PARAM_INT);
                    if ($stmt->execute()){
                        return "success";
                        }else{
                            return "Error";
                        }
                }else{
                    return "Error";
                }
            }else{
                return "Error";
            }
            $stmt->close();
        }
        
        public static function cambiarLogoModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET logo=:logo WHERE id=:id");
            $stmt->bindParam(':logo', $datosController["logo"], PDO::PARAM_STR);
            $stmt->bindParam(':id', $datosController["idem"], PDO::PARAM_INT);
            if ($stmt->execute()){
                return "success";
            }else{
                return "Error";
                }
            $stmt->close();
        }
    }