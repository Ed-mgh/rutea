<?php
	$controlador = new controladorcliente();
	if(isset($_GET['id_cli'])){
		$row= $controlador->consultar($_GET['id_cli']);


	}else{
		echo "
		<script language='JavaScript'>
		alert('Registro modificado');
		window.location.href='?cargar=iniciocliente';
		</script>";
	}
	$controlador->eliminar($_GET['id_cli']);

	echo "
	<script language='JavaScript'>
	alert('Registro eliminado');
	window.location.href='?cargar=iniciocliente';
	</script>";

	?>