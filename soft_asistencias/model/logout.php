<?php
/*session_start();
session_destroy();
unset($_SESSION['username']);
header('location: ../view/init/log.php');
exit();*/

    session_start();
    foreach($_SESSION as $key => $value){
        $_SESSION[$key] = NULL; 
      }

    session_unset();
    session_destroy();

    header("Location: ../log");
?>