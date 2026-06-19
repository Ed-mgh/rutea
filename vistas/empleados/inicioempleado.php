<?php

$empleado = new empleados();

$buscar = '';

if (!empty($_POST['buscar'])) {
    $buscar = $_POST['buscar'];
    $resultado = $empleado->filtrar($buscar);
} else {
    $resultado = $empleado->listar();
}

?>

<form method="POST" action="">
    <label>Nombre del empleado</label>
    <input class="form-control" type="search" name="buscar" value="<?php echo $buscar; ?>">
</form>

<table class="table table-striped table-dark align-middle text-center">
    <thead>
        <tr>
            <th class="table-success">ID</th>
            <th class="table-success">Nombre</th>
            <th class="table-success">Dirección</th>
            <th class="table-success">Teléfono</th>
            <th class="table-success">Salario</th>
            <th class="table-success">Puesto</th>
            <th class="table-success">Editar</th>
            <th class="table-success">Eliminar</th>
        </tr>
    </thead>

    <tbody>
        <?php while($row = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $row['id_emp']; ?></td>
                <td><?php echo $row['nom_emp']; ?></td>
                <td><?php echo $row['dir_emp']; ?></td>
                <td><?php echo $row['tel_emp']; ?></td>
                <td><?php echo $row['salario']; ?></td>
                <td><?php echo $row['puesto']; ?></td>

                <td>
                    <a href = "?cargar=editarempleado&id_emp=<?php echo $row['id_emp']; ?>" class="d-inline-block text-decoration-none">
                        <i class="fa-regular fa-address-card fa-fw"></i>
                    </a>
                </td>

                <td>
                    <a onclick="confirmar(<?php echo $row['id_emp']; ?>)" class="d-inline-block text-decoration-none" style="cursor:pointer;">
                        <i class="fa-solid fa-file-circle-minus fa-fw text-danger"></i>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="<?php echo BASE_URL; ?>js/jquery.js"></script>
<script src="<?php echo BASE_URL; ?>js/sweetalert.min.js"></script>

<script>
function confirmar(id_emp) {

    swal({
        title: "¿Estás seguro de eliminar el registro?",
        text: "Ya no podrás recuperarlo",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    },
    function() {
        window.location.href='?cargar=eliminarempleado&id_emp=' + id_emp;
    });

}
</script>