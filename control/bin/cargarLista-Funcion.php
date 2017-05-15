<?php
include_once '../login/includes/db_connect.php';
include_once '../login/includes/functions.php'; 
sec_session_start();
if (login_check($mysqli) == true) :
//ignore_user_abort(1); // sigue ejecutando aunque el usuario halla cerrado la conexión
ini_set('max_execution_time', 6000000);
//set_time_limit(0); // el script no tiene límite de tiempo
$dir_descarga="/var/www/html/control/uploads/";
$dir_subida = "/var/www/html/control/uploads/{$_FILES['btn-info'] ['name']}";
$url_orig=substr($dir_subida, 30);

if (move_uploaded_file($_FILES['btn-info']['tmp_name'], $dir_subida)) {
    echo "<span class='label label-success'>El fichero es válido y se subió con éxito.\n</span><br/>";
		date_default_timezone_set("America/Lima");
		$id=date("_d-m-Y-(H-i-s)");		
		$ale2=md5($id);
		$_SESSION["user_sesion"]=$ale2;
		$us=$_SESSION["user_sesion"];
	$v1 = escapeshellcmd($url_orig);
	$v2 = escapeshellcmd($id);
	$v3 = escapeshellcmd($us);
	$console=system("nohup php -f /var/www/html/control/bin/backProcess.php $v1 $v2 $v3>> /var/www/html/control/uploads/output.txt 2>> /var/www/html/control/uploads/error.txt &");
	header("Location:../index.php?s=2");
} else {
    echo "<span class='label label-warning'>Error al subir archivos\n</span><br/>";
}

else :
echo "Acceso no autorizado";
endif;
?>