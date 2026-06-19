<?php
$controlador = new controladorcliente();

if(isset($_POST['registrar'])){
    $r = $controlador->crear($_POST['nom_cli'], $_POST['dir_cli'], $_POST['tel_cli'], $_POST['fecha_cli'], $_POST['sexo']);

    if($r){
        echo "
            <script>
                alert('Cliente registrado correctamente');
                window.location.href='?cargar=iniciocliente';
            </script>";
    } else {
        echo "
            <script>
                alert('No se pudo registrar el cliente. Verifica que todos los campos estén llenos y que la tabla clientes exista correctamente.');
            </script>";
    }
}
?>

<h1 class="titulo-formulario"><b>Registro de clientes</b></h1>
<section>
    <div class="container">
        <div>
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">
                    <table width="100%" color="#fff">
                        <form action="" method="post" id="frmcliente">
                            <tr class="espacio">
                                <td align="right"><label for="nom_cli" class="colorlabel">Nombre:</label></td>
                                <td><input type="text" class="form-control" name="nom_cli" id="nom_cli" placeholder="Ingresa un nombre" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,254}" oninvalid="this.setCustomValidity('Ingresa solo letras')" oninput="this.setCustomValidity('')" autofocus required></td>
                            </tr>
                            <tr class="espacio">
                                <td align="right"><label for="dir_cli" class="colorlabel">Dirección:</label></td>
                                <td><input type="text" class="form-control" name="dir_cli" id="dir_cli" placeholder="Ingresa la dirección" required></td>
                            </tr>
                            <tr class="espacio">
                                <td align="right"><label for="tel_cli" class="colorlabel">Teléfono:</label></td>
                                <td><input type="text" class="form-control" name="tel_cli" id="tel_cli" placeholder="Ingresa el teléfono" required></td>
                            </tr>
                            <tr class="espacio">
                                <td align="right"><label for="fecha_cli" class="colorlabel">Fecha de nacimiento:</label></td>
                                <td><input type="date" class="form-control" name="fecha_cli" id="fecha_cli" required></td>
                            </tr>
                            <tr class="espacio">
                                <td align="right"><label for="sexo" class="colorlabel">Sexo:</label></td>
                                <td>
                                    <select class="form-control" name="sexo" id="sexo" required>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Hombre">Hombre</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2"><input type="submit" name="registrar" class="btn btn-primary" value="Registrar" title="Registrar"></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
