<?php
require_once __DIR__ . '/conexion.php';

class productos
{
    // atributos

    private $id_prod;
    private $nom_prod;
    private $cantidad;
    private $precio_uni;
    private $categoria;
    private $marca;
    private $descripcion;
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
        $sql = "SELECT * FROM productos";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function filtrar($valor)
    {
        $sql = "SELECT * FROM productos WHERE nom_prod LIKE '$valor%'";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function crear()
    {
        $sql = "INSERT INTO productos
                (nom_prod, cantidad, precio_uni, categoria, marca, descripcion)
                VALUES
                ('{$this->nom_prod}',
                 '{$this->cantidad}',
                 '{$this->precio_uni}',
                 '{$this->categoria}',
                 '{$this->marca}',
                 '{$this->descripcion}')";

        $this->con->consultaSimple($sql);
        return true;
    }

    public function eliminar()
    {
        $sql = "DELETE FROM productos WHERE id_prod = '{$this->id_prod}'";
        $this->con->consultaSimple($sql);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM productos WHERE id_prod = '{$this->id_prod}'";
        $resultado = $this->con->consultaRetorno($sql);

        $row = mysqli_fetch_assoc($resultado);

        // set

        $this->id_prod = $row['id_prod'];
        $this->nom_prod = $row['nom_prod'];
        $this->cantidad = $row['cantidad'];
        $this->precio_uni = $row['precio_uni'];
        $this->categoria = $row['categoria'];
        $this->marca = $row['marca'];
        $this->descripcion = $row['descripcion'];

        return $row;
    }

    public function editar()
    {
        $sql = "UPDATE productos SET
                nom_prod = '{$this->nom_prod}',
                cantidad = '{$this->cantidad}',
                precio_uni = '{$this->precio_uni}',
                categoria = '{$this->categoria}',
                marca = '{$this->marca}',
                descripcion = '{$this->descripcion}'
                WHERE id_prod = '{$this->id_prod}'";

        $this->con->consultaSimple($sql);
        return true;
    }
}
?>