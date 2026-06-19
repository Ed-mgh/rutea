<?php
	$controlador = new controladorcliente();
	if(isset($_GET['id_cli'])){
		$row= $controlador->consultar($_GET['id_cli']);
		if(!$row){
			echo "<script>alert('Cliente no encontrado'); window.location.href='?cargar=iniciocliente';</script>";
			exit;
		}

	}else{
		header('Location: index.php');
	}
	if(isset($_POST['registrar'])){
		$r= $controlador->editar($_GET['id_cli'], $_POST['nom_cli'], $_POST['dir_cli'], $_POST['tel_cli'], $_POST['fecha_cli'], $_POST['sexo']);

		if($r){
			echo "
                <script language='JavaScript'>
                alert('Registro modificado');
                window.location.href='?cargar=iniciocliente';
                </script>";
		} else {
			echo "<script>alert('No se pudo modificar el cliente. Verifica que todos los campos estén llenos.');</script>";
		}
	}
	
?>

<h1 class="titulo-formulario"><b>Editar datos del cliente</b></h1>
<section>
    	<div class="container">
    		<div>
    			<div class="col-md-10 col-md-offset-2">
    					<div class="panel panel-primary">
                      
                      <table width="100%">
                      <form action="" method="post" id="frmeditar_producto">
                      <tr class="espacio"> 
                      <td align="right"> <label for="nombre">Nombre:</label></td><td><input type="text" class="form-control" name="nom_cli" id="nom_cli" required value="<?php echo $row['nom_cli']; ?>"></td>
                      </tr> 
                      <tr class="espacio"> 
                      <td align="right"> <label for="dir_cli">Dirección:</label></td><td><input type="text" class="form-control" name="dir_cli" id="dir_cli" required value="<?php echo $row['dir_cli']; ?>"></td>
                      </tr> 
                       <td align="right"> <label for="tel_cli">Teléfono:</label></td><td><input type="text" class="form-control" name="tel_cli" id="tel_cli" required value="<?php echo $row['tel_cli']; ?>"></td>
                      </tr>
                      <tr class="espacio"> 
                      <td align="right"> <label for="fecha_cli">Fecha de nacimiento:</label></td><td><input type="date" class="form-control" name="fecha_cli" id="fecha_cli" required value="<?php echo $row['fecha_cli']; ?>"></td>
                      </tr> 
                      <tr class="espacio"> 
                      <td align="right"> <label for="sexo">Sexo:</label></td><td><select class="form-control" name="sexo" id="sexo" >
                        <option value="<?php echo $row['sexo'];?>">
                        <?php echo $row['sexo'];
                        ?>
                        </option>
                                <?php if ($row['sexo'] == 'Mujer')
                                { 
                                  echo"<option value='Hombre'>Hombre</option>";
                                }
                                else if ($row['sexo'] == 'Hombre')
                                {
                              	  echo"<option value='Mujer'>Mujer</option>";
                                }
                                ?>
                    </select>
                      </td>
                      <tr>
        			  <td align="center" colspan="2"><input type="submit"  name="registrar" class="btn btn-primary" value="Registrar"  title="Registrar"></td>
                      </tr>
                  	  </form>
                      </table>
                      <!-- termina la tabla -->
                      </div>
                      </div>
    			</div>
    		</div>
    	</div>
    </section>