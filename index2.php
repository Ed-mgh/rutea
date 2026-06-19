<?php
define('BASE_URL', '');
define('APP_PATH', __DIR__);

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['validada']) || $_SESSION['validada'] != 1) {
    header("Location: index.php");
    exit;
}

require_once __DIR__ . '/modulos/enrutador.php';
require_once __DIR__ . '/modulos/controlador.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Refaccionaria Veracruz</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary top-bar wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="index.php">
                    <h1 class="display-5 text-primary m-0">Refaccionaria Veracruz</h1>
                </a>
            </div>
           
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                         <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Productos</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="?cargar=crearproducto" class="dropdown-item">Registro</a>
                                 <a href="?cargar=inicioproducto" class="dropdown-item">Consultar</a>
                                 <a onclick="window.open('reportes/reporte_producto.php')" style = "cursor: pointer;" class="dropdown-item">Generar reporte</a>
                            </div>
                        </div>
                         <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Empleados</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="?cargar=crearempleado" class="dropdown-item">Registro</a>
                                <a href="?cargar=inicioempleado" class="dropdown-item">Consultar</a>
                                 <a onclick="window.open('reportes/reporte_empleado.php')" style = "cursor: pointer;" class="dropdown-item">Generar reporte</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Clientes</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="?cargar=crearcliente" class="dropdown-item">Registrar</a>
                                <a href="?cargar=iniciocliente" class="dropdown-item">Consultar</a>
                                 <a onclick="window.open('reportes/reporte_cliente.php')" style = "cursor: pointer;" class="dropdown-item">Generar reporte</a>
                            </div>
                        </div>
                        <a href="?cargar=cerrar" class="nav-item nav-link">Cerrar sesión</a>
                    </div>
                    <div class="d-none d-lg-flex ms-auto">
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Codigo para la vista-->
    <main class="main">

              <section>
                            <?php
                                
                                $enrutador = new enrutador();
                                if($enrutador->validarGET(@$_GET['cargar'])){
                                    $enrutador->cargarVista($_GET['cargar']);
                                }                        
                            ?>
              </section>
   

  </main>
    <!-- Vista End -->
   


    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>