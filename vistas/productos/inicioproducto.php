<?php

    $producto = new productos();

    if (isset($_POST)) {
        $buscar = @$_POST['buscar'];
        $resultado = $producto->filtrar($buscar);
    } else {
        $resultado = $producto->listar();
    }
?>

<form method="POST" action="">
     <label>Nombre del producto</label><input class="form-control" type="search" name="buscar" value="<?php echo $buscar ?>">
</form>

<table class='table table-striped table-dark align-middle text-center'>
    <thead>
        <tr>
            <th class='table-success'>Id</th>
            <th class='table-success'>Nombre</th>
            <th class='table-success'>Cantidad</th>
            <th class='table-success'>Precio Unitario</th>
            <th class='table-success'>Categoría</th>
            <th class='table-success'>Marca</th>
            <th class='table-success'>Descripción</th>
            <th class='table-success'>Editar</th>
            <th class='table-success'>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $row['id_prod']; ?></td>
                <td><?php echo $row['nom_prod']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td><?php echo $row['precio_uni']; ?></td>
                <td><?php echo $row['categoria']; ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>

                <td>
                    <a href="?cargar=editarproducto&id_prod=<?php echo $row['id_prod']; ?>" class="d-inline-block text-decoration-none">
                        <i class="fa-slab-press fa-regular fa-address-card fa-fw"></i>
                    </a>
                </td>

                <td>
                    <a onClick='confirmar(<?php echo $row['id_prod']; ?>)' class="d-inline-block text-decoration-none" style="cursor:pointer;">
                        <i class="fa-solid fa-file-circle-minus fa-fw text-danger"></i>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="<?php echo BASE_URL; ?>js/jquery.js"></script>
<script src="<?php echo BASE_URL; ?>js/sweetalert.min.js"></script>

<script language="javascript">
function confirmar(id_prod) {

    var MyId = id_prod;

    swal({
        title: "¿Estas seguro de eliminar el registro?",
        text: "Ya no podrás recuperarlo",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí, borrar",
        closeOnConfirm: false
    },
    function(){

        window.location.href='?cargar=eliminarproducto&id_prod=' + MyId;

    });

}
</script>