<?php
	$controlador = new controladorproducto();

	if(isset($_GET['id_prod'])){
		$row = $controlador->consultar($_GET['id_prod']);
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['registrar'])){
		$r = $controlador->editar(
			$_GET['id_prod'],
			$_POST['nom_prod'],
			$_POST['cantidad'],
			$_POST['precio_uni'],
			$_POST['categoria'],
			$_POST['marca'],
			$_POST['descripcion']
		);

		if($r){
			echo "
                <script language='JavaScript'>
                alert('Registro modificado');
                window.location.href='?cargar=inicioproducto';
                </script>";
		}
	}
?>

<h1 class="titulo-formulario"><b>Editar datos del producto</b></h1>

<section>
	<div class="container">
		<div>
			<div class="col-md-10 col-md-offset-2">
				<div class="panel panel-primary">

					<table width="100%">
					<form action="" method="post" id="frmeditar_producto">

						<tr class="espacio">
							<td align="right">
								<label for="nom_prod">Nombre:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="nom_prod" id="nom_prod" value="<?php echo $row['nom_prod']; ?>">
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="cantidad">Cantidad:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="cantidad" id="cantidad" required value="<?php echo $row['cantidad']; ?>">
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="precio_uni">Precio unitario:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="precio_uni" id="precio_uni" required value="<?php echo $row['precio_uni']; ?>">
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="categoria">Categoría:</label>
							</td>

							<td>
								<select class="form-control" name="categoria" id="categoria">
									<option value="<?php echo $row['categoria']; ?>">
										<?php echo $row['categoria']; ?>
									</option>
									<?php
									if ($row['categoria'] == 'motor'){
										echo "<option value='aceite'>Aceite</option>";
										echo "<option value='frenos'>Frenos</option>";
									}
									else if ($row['categoria'] == 'aceite'){
										echo "<option value='motor'>Motor</option>";
										echo "<option value='frenos'>Frenos</option>";
									}
									else if ($row['categoria'] == 'frenos'){
										echo "<option value='motor'>Motor</option>";
										echo "<option value='aceite'>Aceite</option>";
									}
									?>
								</select>
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="marca">Marca:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="marca" id="marca" value="<?php echo $row['marca']; ?>">
							</td>
						</tr>

						<tr class="espacio">
							<td align="right">
								<label for="descripcion">Descripción:</label>
							</td>
							<td>
								<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>">
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