<?php
    require_once __DIR__ . '/conexion.php';
    class Login {
        private $user;
        private $pass;
        private $con;

        public function __construct($user, $pass){
            $this->user = $user;
            $this->pass = $pass;
            $this->con = new conexion();
    }

    public function validar(){
    //consulta  preparada: solo selecciona el usuario
    $sql = "SELECT nombre, bandera, user, pass
            FROM usuarios
            WHERE user = ?";

    $stmt = $this->con->getConexion()->prepare($sql);
    $stmt->bind_param("s", $this->user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($fila = $result->fetch_assoc()){
        //Verifica la contraseña con password_verify
            if($this->pass== $fila['pass']){
            @session_start();
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['bandera'] = $fila['bandera'];
            $_SESSION['user'] = $fila['user'];
            $_SESSION['validada'] = 1;
            session_regenerate_id(true); //seguridad extra
            return true;
        }
    }

    }
            public function getConexion(){
        return $this->con;
    }
    }
?>