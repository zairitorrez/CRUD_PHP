<?php
require_once "modelo/Producto.php";
require_once "modelo/ProductoDao.php";

class ProductoController
{
    private $dao;

    // // CONSTRUCTOR
    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    // // LISTAR
    public function index()
    {
        $productos = $this->dao->listar();
        require "vista/productos/index.php";
    }

    // // NUEVO
    public function nuevo()
    {
        $producto = new Producto();
        require "vista/productos/formulario.php";
    }

    // // GUARDAR
    public function guardar()
    {
        $producto = new Producto();
        $producto->setNombre($_POST["nombre"]);
        $producto->setPrecio($_POST["precio"]);
        $producto->setStock($_POST["stock"]);
        $this->dao->insertar($producto);
        header("Location: index.php");
        exit;
    } // <-- Se quitó la llave extra que cerraba la clase aquí

    // // EDITAR
    public function editar()
    {
        $id = $_GET["id"];
        $producto = $this->dao->buscarPorId($id);
        require "vista/productos/formulario.php";
    }

    // // ACTUALIZAR
    public function actualizar()
    {
        $producto = new Producto();
        $producto->setId($_POST["id"]); // Recuerda agregar este método en Producto.php
        $producto->setNombre($_POST["nombre"]);
        $producto->setPrecio($_POST["precio"]);
        $producto->setStock($_POST["stock"]);
        $this->dao->actualizar($producto);
        header("Location: index.php");
        exit;
    }

    // // ELIMINAR
    public function eliminar()
    {
        $id = $_GET["id"];
        $this->dao->eliminar($id);
        header("Location: index.php");
        exit;
    }
} // <-- Ahora esta única llave cierra correctamente toda la clase
