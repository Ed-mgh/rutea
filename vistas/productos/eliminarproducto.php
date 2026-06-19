<?php
	$controlador = new controladorproducto();

	if(isset($_GET['id_prod'])){
		$row = $controlador->consultar($_GET['id_prod']);

	}else{
		echo "
		<script language='JavaScript'>
		alert('Registro modificado');
		window.location.href='?cargar=inicioproducto';
		</script>";
	}

	$controlador->eliminar($_GET['id_prod']);

	echo "
	<script language='JavaScript'>
	alert('Registro eliminado');
	window.location.href='?cargar=inicioproducto';
	</script>";
?>