<?php
include_once '../login/includes/db_connect.php';
include_once '../login/includes/functions.php';
include_once '../login/sesion/Sesion.php';
sec_session_start();
if (login_check($mysqli) == true){
    $u=$_GET['u'];
	$r=$_GET['r'];
	$o=$_GET['o'];	
	$rDeco=decrypt($r,"5tha8");
	$oDeco=decrypt($o,"5tha8");	
	$nombre_fichero = '../uploads/'.$rDeco;
	$nombre_fichero_orig = '../uploads/'.$oDeco;
	if (file_exists($nombre_fichero)) {
		unlink($nombre_fichero);//Si existe, borra el archivo		
	}	
	if (file_exists($nombre_fichero_orig)) {
		unlink($nombre_fichero_orig);//Si existe, borra el archivo
	}	
	$newSesion= new Sesion();
	$newSesion->borraReg($u);//borra la referencia	
	header("Location:../index.php?s=3");
}
else{ 
echo "Acceso no autorizado";}
?>