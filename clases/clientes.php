<?php
require_once __DIR__ . '/conexion.php';

class clientes
{
    private $id_cli;
    private $nom_cli;
    private $dir_cli;
    private $tel_cli;
    private $fecha_cli;
    private $sexo;
    private $con;

    public function __construct()
    {
        $this->con = new conexion();
    }

    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    private function limpiar($valor)
    {
        return $this->con->escapar(trim($valor));
    }

    public function listar()
    {
        $sql = "SELECT id_cli, nom_cli, dir_cli, tel_cli, fecha_cli, sexo FROM clientes";
        return $this->con->consultaRetorno($sql);
    }

    public function filtrar($valor)
    {
        $valor = $this->limpiar($valor);
        $sql = "SELECT id_cli, nom_cli, dir_cli, tel_cli, fecha_cli, sexo 
                FROM clientes 
                WHERE nom_cli LIKE '$valor%'";
        return $this->con->consultaRetorno($sql);
    }

    public function crear()
    {
        $nom_cli = $this->limpiar($this->nom_cli);
        $dir_cli = $this->limpiar($this->dir_cli);
        $tel_cli = $this->limpiar($this->tel_cli);
        $fecha_cli = $this->limpiar($this->fecha_cli);
        $sexo = $this->limpiar($this->sexo);

        if ($nom_cli == '' || $dir_cli == '' || $tel_cli == '' || $fecha_cli == '' || $sexo == '') {
            return false;
        }

        $sql = "INSERT INTO clientes (nom_cli, dir_cli, tel_cli, fecha_cli, sexo)
                VALUES ('$nom_cli', '$dir_cli', '$tel_cli', '$fecha_cli', '$sexo')";

        return $this->con->consultaSimple($sql) ? true : false;
    }

    public function eliminar()
    {
        $id_cli = (int)$this->id_cli;
        $sql = "DELETE FROM clientes WHERE id_cli = $id_cli";
        return $this->con->consultaSimple($sql);
    }

    public function consultar()
    {
        $id_cli = (int)$this->id_cli;
        $sql = "SELECT id_cli, nom_cli, dir_cli, tel_cli, fecha_cli, sexo 
                FROM clientes 
                WHERE id_cli = $id_cli";

        $resultado = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($resultado);

        if (!$row) {
            return null;
        }

        $this->id_cli = $row['id_cli'];
        $this->nom_cli = $row['nom_cli'];
        $this->dir_cli = $row['dir_cli'];
        $this->tel_cli = $row['tel_cli'];
        $this->fecha_cli = $row['fecha_cli'];
        $this->sexo = $row['sexo'];

        return $row;
    }

    public function editar()
    {
        $id_cli = (int)$this->id_cli;
        $nom_cli = $this->limpiar($this->nom_cli);
        $dir_cli = $this->limpiar($this->dir_cli);
        $tel_cli = $this->limpiar($this->tel_cli);
        $fecha_cli = $this->limpiar($this->fecha_cli);
        $sexo = $this->limpiar($this->sexo);

        if ($nom_cli == '' || $dir_cli == '' || $tel_cli == '' || $fecha_cli == '' || $sexo == '') {
            return false;
        }

        $sql = "UPDATE clientes SET 
                    nom_cli = '$nom_cli', 
                    dir_cli = '$dir_cli', 
                    tel_cli = '$tel_cli', 
                    fecha_cli = '$fecha_cli', 
                    sexo = '$sexo' 
                WHERE id_cli = $id_cli";

        return $this->con->consultaSimple($sql) ? true : false;
    }
}
?>
