<?php
class conexion
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $con;
    private $ultimo_error;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "refa";
        $this->pass = "";
        $this->db = "refaccionaria";
        $this->ultimo_error = "";

        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->con) {
            die("Error de conexion: " . mysqli_connect_error());
        }

        mysqli_set_charset($this->con, "utf8mb4");
    }

    public function consultaSimple($sql)
    {
        $resultado = mysqli_query($this->con, $sql);

        if (!$resultado) {
            $this->ultimo_error = mysqli_error($this->con);
            return false;
        }

        return $resultado;
    }

    public function consultaRetorno($sql)
    {
        $resultado = mysqli_query($this->con, $sql);

        if (!$resultado) {
            $this->ultimo_error = mysqli_error($this->con);
            die("Error en la consulta: " . $this->ultimo_error);
        }

        return $resultado;
    }

    public function escapar($valor)
    {
        return mysqli_real_escape_string($this->con, $valor);
    }

    public function getError()
    {
        return $this->ultimo_error;
    }

    public function getConexion()
    {
        return $this->con;
    }
}
?>
