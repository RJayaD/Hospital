<?php 
	
	/**
	 * Mostrar las vistas al usuario
	 *  Enviar las acciones del usuario al controlador
	 */

	require_once ("controller/controller.php");
	require_once ("model/model.php");
	$mvc = new MvcController();
	$mvc -> plantilla();