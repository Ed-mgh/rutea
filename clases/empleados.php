<?php
require_once __DIR__ . '/conexion.php';

class empleados
{
    // atributos

    private $id_emp;
    private $nom_emp;
    private $dir_emp;
    private $tel_emp;
    private $salario;
    private $puesto;
    private $con;

    // métodos

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

    public function listar()
    {
        $sql = "SELECT * FROM empleados";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function filtrar($valor)
    {
        $sql = "SELECT * FROM empleados WHERE nom_emp LIKE '$valor%'";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function crear()
    {
        $sql = "INSERT INTO empleados
                (nom_emp, dir_emp, tel_emp, salario, puesto)
                VALUES
                ('{$this->nom_emp}',
                 '{$this->dir_emp}',
                 '{$this->tel_emp}',
                 '{$this->salario}',
                 '{$this->puesto}')";
        $this->con->consultaSimple($sql);
        return true;
    }

    public function eliminar()
    {
        $sql = "DELETE FROM empleados WHERE id_emp = '{$this->id_emp}'";
        $this->con->consultaSimple($sql);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM empleados WHERE id_emp = '{$this->id_emp}'";
        $resultado = $this->con->consultaRetorno($sql);

        $row = mysqli_fetch_assoc($resultado);

        // set

        $this->id_emp = $row['id_emp'];
        $this->nom_emp = $row['nom_emp'];
        $this->dir_emp = $row['dir_emp'];
        $this->tel_emp = $row['tel_emp'];
        $this->salario = $row['salario'];
        $this->puesto = $row['puesto'];

        return $row;
    }

public function editar()
{
    $sql = "UPDATE empleados SET
            nom_emp = '{$this->nom_emp}',
            dir_emp = '{$this->dir_emp}',
            tel_emp = '{$this->tel_emp}',
            salario = '{$this->salario}',
            puesto = '{$this->puesto}'
            WHERE id_emp = '{$this->id_emp}'";

    $this->con->consultaSimple($sql);
    return true;
}
}
?>