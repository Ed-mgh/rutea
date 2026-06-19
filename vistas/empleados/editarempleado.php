<?php

$controlador = new controladorempleado();

if(isset($_GET['id_emp'])){
    $row = $controlador->consultar($_GET['id_emp']);
}else{
    header('Location: index.php');
}

if(isset($_POST['registrar'])){

    $r = $controlador->editar(
        $_GET['id_emp'],
        $_POST['nom_emp'],
        $_POST['dir_emp'],
        $_POST['tel_emp'],
        $_POST['salario'],
        $_POST['puesto']
    );

    if($r){
        echo "
        <script>
            alert('Registro modificado correctamente');
            window.location.href='?cargar=inicioempleado';
        </script>";
    }
}

?>

<h1 class="titulo-formulario"><b>Editar datos del empleado</b></h1>

<section>
    <div class="container">
        <div>
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">

                    <table width="100%">
                    <form action="" method="post">

                        <tr class="espacio">
                            <td align="right">
                                <label>Nombre:</label>
                            </td>
                            <td>
                                <input type="text"
                                       class="form-control"
                                       name="nom_emp"
                                       value="<?php echo $row['nom_emp']; ?>"
                                       required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label>Dirección:</label>
                            </td>
                            <td>
                                <input type="text"
                                       class="form-control"
                                       name="dir_emp"
                                       value="<?php echo $row['dir_emp']; ?>"
                                       required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label>Teléfono:</label>
                            </td>
                            <td>
                                <input type="text"
                                       class="form-control"
                                       name="tel_emp"
                                       value="<?php echo $row['tel_emp']; ?>"
                                       required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label>Salario:</label>
                            </td>
                            <td>
                                <input type="number"
                                       step="0.01"
                                       class="form-control"
                                       name="salario"
                                       value="<?php echo $row['salario']; ?>"
                                       required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label>Puesto:</label>
                            </td>
                            <td>
                                <input type="text"
                                       class="form-control"
                                       name="puesto"
                                       value="<?php echo $row['puesto']; ?>"
                                       required>
                            </td>
                        </tr>

                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit"
                                       name="registrar"
                                       class="btn btn-primary"
                                       value="Guardar cambios">
                            </td>
                        </tr>

                    </form>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>