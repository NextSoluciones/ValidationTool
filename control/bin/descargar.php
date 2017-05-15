<?php 
include_once '../login/includes/db_connect.php';
include_once '../login/includes/functions.php';
$res=sec_session_start();
$userSession=$_GET['u'];
if (login_check($mysqli) == true){
$file=$_GET['id'];
$archivo = decrypt($file,"5tha8");
$ruta = '../uploads/'.$archivo;
if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archivo);
   header('Content-Transfer-Encoding: binary');
   header('Content-Type: text/csv; charset=utf-8');
   header('Content-Length: '.filesize($ruta));
   $r=readfile($ruta); 
   $v1 = escapeshellcmd($userSession);
   $console=system("nohup php -f /var/www/html/control/bin/inc/backActDesc.php $v1>> /var/www/html/control/uploads/output2.txt 2>> /var/www/html/control/uploads/error2.txt &");
}
else
   exit();
}
else{ 
echo "Acceso no autorizado";}
?>
