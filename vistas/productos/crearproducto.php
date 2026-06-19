<?php
	$controlador = new controladorproducto();

	if(isset($_POST['registrar'])){

		$r= $controlador->crear(
			$_POST['nom_prod'],
			$_POST['cantidad'],
			$_POST['precio_uni'],
			$_POST['categoria'],
			$_POST['marca'],
			$_POST['descripcion']
		);

		echo $r;

		if($r){
			echo "
			<script>
				if(confirm(\"¿Desea realizar un nuevo registro?\")){
					window.location.href='?cargar=crearproducto';
				}else{
					window.location.href='?cargar=inicioproducto';
				}
			</script>";
		}
	}
?>

<h1 class="titulo-formulario"><b>Registro de productos</b></h1>

<section>
	<div class="container">
		<div>
			<div class="col-md-10 col-md-offset-2">
				<div class="panel panel-primary">

					<table width="100%" color="#fff">
					<form action="" method="post" id="frmproducto" enctype="multipart/form-data">

						<tr class="espacio">
							<td align="right">
								<label for="nom_prod" class="colorlabel">Nombre:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="nom_prod" id="nom_prod" placeholder="Ingresa el nombre" autofocus required>
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="cantidad" class="colorlabel">Cantidad:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingresa la cantidad" required>
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="precio_uni" class="colorlabel">Precio unitario:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="precio_uni" id="precio_uni" placeholder="Ingresa el precio unitario" required>
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="categoria" class="colorlabel">Categoría:</label>
							</td>
							<td>
								<select class="form-control" name="categoria" id="categoria">
									<option value="motor">Motor</option>
									<option value="aceite">Aceite</option>
									<option value="frenos">Frenos</option>
								</select>
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="marca" class="colorlabel">Marca:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="marca" id="marca" placeholder="Ingresa la marca" required>
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="descripcion" class="colorlabel">Descripción:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingresa la descripción">
							</td>
						</tr>

						<tr>
							<td align="center" colspan="2">
								<input type="submit" name="registrar" class="btn btn-primary" value="Registrar" title="Registrar">
							</td>
						</tr>

					</form>
					</table>

				</div>
			</div>
		</div>
	</div>
</section>