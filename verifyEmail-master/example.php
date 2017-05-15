<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'vendor/autoload.php';

$ve = new hbattat\VerifyEmail('ventas@nslatino.com', 'soporte@nextsoluciones.pw');

var_dump($ve->verify());

echo '<pre>';print_r($ve->get_debug());

echo '<pre>';

if (isset($ve->get_errors()[0]))
{
	echo "Error";
}
else
{
	echo "NO";
}

