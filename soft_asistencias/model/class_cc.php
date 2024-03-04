<?php
    
    require_once ('class_config.php');

    class Conexion extends Config {

    	public static function conectar() {
    		try {
    			if ('Desarrollo' == self::AMBIENTE) {
	    			$cc = new PDO(self::$_SERVIDOR, self::$_USUARIO, self::$_CLAVE,
						array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::FETCH_OBJ));
                        
                        date_default_timezone_set('America/Guayaquil');
				}				
    		} catch (Exception $e) {
    			echo 'Error en la conexi&oacute;n <br />'. $e->getMessage();
    		}
            return $cc;
    	}

    	public static function Close_Conexion() {
    		return $cc->close();
    	}
	}