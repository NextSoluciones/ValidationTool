<?php
   $userSession=$argv[1];
   include_once '../login/sesion/Sesion.php';
   $newSesion= new Sesion();
   $newSesion->actualizaDescarga($userSession);
?>