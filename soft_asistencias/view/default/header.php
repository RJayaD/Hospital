<?php 

    session_start(); 
    require_once ("controller/controller_empleados.php");
    $args = new EmpleadosController();
    
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <title>SISTEMA</title>
    
  </head>
  <body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SISTEMAS DE ASISTENCIAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php 
      if (isset($_SESSION["usuario"])) {
      if ($_SESSION) { ?>

        <li class="nav-item"><a class="nav-link" href="empleados">EMPLEADOS</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ASISTENCIA
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="asistencia_entrada">REGISTRO DE ENTRADA</a></li>
            <li><a class="dropdown-item" href="asistencia_salida">REGISTRO DE SALIDA</a></li>
            <li><hr class="dropdown-divider"></li>            
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Salir
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><?php echo @$_SESSION['usuario']; ?></a></li>
            <li><a class="dropdown-item" href="model/logout.php">Cerrar Sesión</a></li>
            <li><hr class="dropdown-divider"></li>            
          </ul>
        </li>

        <?php } }  ?>
      </ul>
      
    </div>
  </div>
</nav>