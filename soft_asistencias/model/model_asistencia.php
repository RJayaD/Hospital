<?php
    require_once ("class_cc.php");

    class AsistenciaModel {

        
        public static function vistaAsistenciaModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT fecha FROM $tabla 
                                                        WHERE fecha is not null AND
                                                            id_estado = 1 
                                                        GROUP BY fecha");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }
        
        public static function vistaSalidaModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT fecha FROM $tabla 
                                                        WHERE fecha is not null AND
                                                            id_estado = 1 
                                                        GROUP BY fecha");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }
    }