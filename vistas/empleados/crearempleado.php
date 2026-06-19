<?php

$controlador = new controladorempleado();

if(isset($_POST['registrar'])){

    $r = $controlador->crear(
        $_POST['nom_emp'],
        $_POST['dir_emp'],
        $_POST['tel_emp'],
        $_POST['salario'],
        $_POST['puesto']
    );

    if($r){
        echo "
        <script>
            if(confirm('¿Desea realizar un nuevo registro?')){
                window.location.href='?cargar=crearempleado';
            }else{
                window.location.href='?cargar=inicioempleado';
            }
        </script>";
    }
}

?>

<h1 class="titulo-formulario"><b>Registro de empleados</b></h1>

<section>
    <div class="container">
        <div>
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">

                    <table width="100%">
                    <form action="" method="post" id="frmempleado">

                        <tr class="espacio">
                            <td align="right">
                                <label for="nom_emp">Nombre:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="nom_emp"id="nom_emp"placeholder="Ingresa el nombre" pattern="[A-Za-z]+"required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label for="dir_emp">Dirección:</label>
                            </td>
                            <td>
                                <input type="text"
                                       class="form-control" name="dir_emp" id="dir_emp" placeholder="Ingresa la dirección" required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label for="tel_emp">Teléfono:</label>
                            </td>
                            <td>
                                <input type="text"
                                       class="form-control"
                                       name="tel_emp"
                                       id="tel_emp"
                                       pattern="[0-9]+"
                                       placeholder="Ingresa el teléfono"
                                       required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label for="salario">Salario:</label>
                            </td>
                            <td>
                                <input type="number"
                                       step="0.01"
                                       class="form-control"
                                       name="salario"
                                       id="salario"
                                       pattern="[0-9]+"
                                       placeholder="Ingresa el salario"
                                       required>
                            </td>
                        </tr>

                        <tr class="espacio">
                            <td align="right">
                                <label for="puesto">Puesto:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="puesto" id="puesto" pattern="[A-Za-z]+" placeholder="Ingresa el puesto" required>
                            </td>
                        </tr>

                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit"
                                       name="registrar"
                                       class="btn btn-primary"
                                       value="Registrar">
                            </td>
                        </tr>

                    </form>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>