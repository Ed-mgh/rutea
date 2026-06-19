<?php

    $cliente = new clientes();
    $buscar = '';

    if (isset($_POST['buscar'])) {
        $buscar = $_POST['buscar'];
        $resultado = $cliente->filtrar($buscar);
    } else {
        $resultado = $cliente->listar();
    }
?>

<form method="POST" action="">
     <label>Nombre del cliente</label><input class="form-control" type="search" name="buscar" value="<?php echo htmlspecialchars($buscar); ?>">
 </form>

 <table class='table table-striped table-dark align-middle text-center'>
    <thead>
        <tr>
            <th class='table-success'>Id</th>
            <th class='table-success'>Nombre</th>
            <th class='table-success'>Dirección</th>
            <th class='table-success'>Teléfono</th>
            <th class='table-success'>Fecha de nacimiento</th>
            <th class='table-success'>Sexo</th>
            <th class='table-success'>Editar</th>
            <th class='table-success'>Eliminar</th>                                                                                                                                                                                                                                                                          
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $row['id_cli']; ?></td>
                <td><?php echo $row['nom_cli']; ?></td>
                <td><?php echo $row['dir_cli']; ?></td>
                <td><?php echo $row['tel_cli']; ?></td>
                <td><?php echo $row['fecha_cli']; ?></td>
                <td><?php echo $row['sexo']; ?></td>
                
                <td>
                    <a href="?cargar=editarcliente&id_cli=<?php echo $row['id_cli']; ?>" class="d-inline-block text-decoration-none">
                        <i class="fa-slab-press fa-regular fa-address-card fa-fw"></i>
                    </a>
                </td>
                
                <td>
                    <a onClick='confirmar(<?php echo $row['id_cli']; ?>)' class="d-inline-block text-decoration-none" style="cursor:pointer;">
                        <i class="fa-solid fa-file-circle-minus fa-fw text-danger"></i>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="<?php echo BASE_URL; ?>js/jquery.js"></script>
<script src="<?php echo BASE_URL; ?>js/sweetalert.min.js"></script>
 
 <script language = "javascript">
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

        window.location.href='?cargar=eliminarcliente&id_cli='+MyId;
      
    });
    
}
           
</script>