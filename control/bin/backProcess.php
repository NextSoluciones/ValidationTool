<?php
include_once '../login/includes/db_connect.php';
include_once '../login/includes/functions.php'; 
include '../../verifyEmail-master/vendor/autoload.php';
include_once '../login/sesion/Sesion.php';
//*************OBTENER LOS CORREOS DEL ARCHIVO**********************
$url_orig=$argv[1];
$id=$argv[2];

$dir_subida="/var/www/html/control/uploads/".$url_orig;
$dir_descarga="/var/www/html/control/uploads/";
$fila = 1;
$controlEmail=901;
$actControlEmail=0;
$cont=1;
$res=array();

$var_url=encrypt("resultados".$id.".csv","5tha8");
$urlX2="descargar.php?id=".$var_url;
	
	$userSession=$argv[3];
	$newSesion=new Sesion();
	$newSesion->iniciarSesion($userSession);	
$newSesion->iniciaCarga($userSession,$urlX2);
$newSesion->origen($userSession, $url_orig);
if (($gestor = fopen($dir_subida, "rb")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 500, ",")) !== FALSE) {               
        $fila++;        
        //llama a la funcion validar correo
        $actControlEmail++;
	$inter=20;
	if ($cont%$inter==0){
	   $newSesion->actualizaCarga($userSession,$inter);
	}
	$cont++;
        if ($actControlEmail>$controlEmail){
            $actControlEmail=0;}
        $esValido=validarCorreo($datos[0],$actControlEmail,$controlEmail);
        list($col2,$col3)=split("</td><td>",$esValido); //Verificar posible error
        $row=array($datos[0],$col2,$col3);
        $res[] = $row;
    }
    fclose($gestor);
}
$fp = fopen($dir_descarga.'resultados'.$id.'.csv', 'wb');
	foreach ($res as $fila) {
		fputcsv($fp, $fila);
	}
fclose($fp);
$newSesion->actualizaEstado($userSession, 2);
function validarCorreo($email,$i,$n)
{
    $email = trim($email);
	list($username,$domain)=split("@",$email);
    $tipo=0;
    //tipo 0=otro, tipo 1=yahoo tipo2=hotmail tipo3=gmail
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/",$email)){
        $esyahoo = strripos($domain, 'yahoo.');
        $esHotmail = strripos($domain, 'hotmail.com');
        $esGmail = strripos($domain, 'gmail.com');
        if (!($esyahoo===false)){
            $tipo=1;
        }
        elseif(!($esHotmail===false)){$tipo=2;}
        elseif(!($esGmail===false)){$tipo=3;}
        else {$tipo=0;}
        if ($tipo==1){
            $jsonurl = "https://edit.yahoo.com/reg_json?AccountID=".$email."&PartnerName=yahoo_default&ApiName=ValidateFields&RequestVersion=1&intl=us";
            $json = file_get_contents($jsonurl);
            $cad=json_decode($json,true);
            $cad=$cad['ResultCode'];
            if($cad=='PERMANENT_FAILURE'){
                $test="OK</td><td>Existe";
            }
            else{
                $test="NO</td><td>No existe el correo";
            } 
        }
        else{
            $MxDef=$tipo==2||$tipo==3;
            if ($MxDef){
                //$test="Hotmail o Gmail"."</td>"."<td>MX";
                //validar usuario mail
                $test=validarUser($email,$i,$n);
                }else{
                //$test="OTRO"."</td>"."<td>MX";
                if(!checkdnsrr($domain, "MX")) {
                  $test="NO</td><td>El dominio no tiene un servidor de correos asociado";
                }
                else{
                    //validad Servidor de correos
                    //$test="OTRO-".$domain."</td>"."<td>Existe servidor de correos asociado";
                    $test=validarUser($email,$i,$n);
                }
            }
            //$test="OTRO"."</td>"."<td>MX";
        }
    }else
    {$test="NO</td><td>Error de formato";}
	//$test="VALIDO";
    return $test;
}
function validarUser($email,$i,$n)
{
    if ($i < $n){
        //$tiempoEspera=20;
        $tiempoEspera=1;
    }
    else {
        $tiempoEspera=20;
    }
    sleep($tiempoEspera);
    $ve = new hbattat\VerifyEmail($email, 'soporte@nextsoluciones.pw');
    if($ve->verify()){
        $test="OK</td><td>Existe";
    }
    else{
        if (isset($ve->get_errors()[0]))
        {
                $test="ERROR</td><td>".$ve->get_errors()[0];
        }
        else
        {
                $test="NO</td><td>El correo no existe";
        }
    //llamar a la funcion validar email.    
    }
    return $test;
}

?>