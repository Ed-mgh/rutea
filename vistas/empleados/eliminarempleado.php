<?php

$controlador = new controladorempleado();

if(isset($_GET['id_emp'])){
    
    $row = $controlador->consultar($_GET['id_emp']);

} else {

    echo "
    <script>
        alert('Empleado no encontrado');
        window.location.href='?cargar=inicioempleado';
    </script>";
    
    exit();
}

$controlador->eliminar($_GET['id_emp']);

echo "
<script>
    alert('Registro eliminado');
    window.location.href='?cargar=inicioempleado';
</script>";

?>