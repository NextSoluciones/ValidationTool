<div class="form-group"><hr> 
<form role = "form" action="bin/cargarLista-Funcion.php" method="POST" enctype="multipart/form-data">

<label>Subir archivo en formato csv</label> 
<input type="file" id="BSbtninfo" name="btn-info"><br/>
<button type="submit" class="btn btn-primary btn-lg active">Procesar</button>
</form>




<script type="text/javascript">
	$('#BSbtninfo').filestyle({ 
buttonName : 'btn-info', 
buttonText : ' Seleccionar Archivo' 
}); 
</script> 
</div>