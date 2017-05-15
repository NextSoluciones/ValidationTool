<?php
include_once 'login/sesion/Sesion.php';
//echo "<p>";
$userSession=$_SESSION["user_sesion"];
echo "Sesion ".$userSession."<br/>";
$newSesion= new Sesion();
$tabla=$newSesion->consultar($userSession);
var_dump($tabla);
//echo "<br/>hola mundo</p>";
?>
