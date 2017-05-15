<?php
sec_session_start();
if (login_check($mysqli) == true){
    include_once 'login/sesion/Sesion.php';
	echo "<br/>";
	$newSesion= new Sesion();
	$tabla=$newSesion->consultarTodos();
	echo "<table class='table table-striped'><tr><th>Id Sesión</th><th>Fecha</th><th>Hora</th><th>Descargar</th><th>Estado</th><th>Acción</th></tr>";
	//var_dump($tabla);
	//echo $tabla[0]["user"]."<p>";
	//echo sizeof($tabla);["estado"]
	foreach ($tabla as $fila => $campo) {
	if ($campo["estado"]!=0) {		
		echo "<tr>";
		$cad=$campo["user"];
		$cad=substr($cad, 0, 5)."...";
		$link;$carga;$estado;$ruta;
		if ($campo["estado"]==2){
			$ruta='bin/'.$campo["url"];			
			$link='<a href="'.$ruta.'&u='.$campo["user"].'">Descargar</a>';
			$estado="Validación Completada";
		}
		else {
			$link="No disponible";
			$carga=$campo["carga"];
			$estado="Validación en proceso...<br/>+ ".$carga." correos validados";
		}
		$url2=substr($campo["url"], 17);
		$origen=$campo["url_orig"];				
		$origen=encrypt($origen, "5tha8");
		if ($campo["descargas"]!=0)
			$link2='<a href="bin/borra.php?u='.$campo["user"].'&r='.$url2.'&o='.$origen.'">Eliminar</a>';
		else 
			$link2="***";
				
		echo "<td>".$cad."</td>";
		echo "<td>".$campo["fecha"]."</td>";
		echo "<td>".$campo["hora"]."</td>";
		echo "<td>".$link."</td>";
		echo "<td>".$estado."</td>";
		echo "<td>".$link2."</td>";
		echo "</tr>";
		
	}		
	}
	echo "</table>";
}
else{ 
echo "Acceso no autorizado";}
?>