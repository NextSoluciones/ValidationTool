<?php

Class Fichero{	
	function limpiarCsv($url){
		if(file_exists($url)) {
		        $file = fopen($url,'r');
		        while(!feof($file)) { 
		            $name = fgets($file);
		            $lineas[] = $name;
		        }
		        fclose($file);
		}
		// Todas las lineas quedan almacenadas en $lineas
		// Ahora eliminas la fila 15 por ejemplo, en el array sería la posicion 14 (empezamos por la 0)
		unset($lineas[0]);
		
		$lineas = array_values($lineas);
		print_r($lineas);
		// GUARDAMOS
		$file = fopen($url, "w");
		foreach( $lineas as $linea ) {
		    fwrite( $file, $linea );
		} 
		fclose( $file );
	}	
}
?>

