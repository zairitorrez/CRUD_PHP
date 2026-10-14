<?php
require_once "Producto.php"; // Cambiado si están en la misma carpeta

class ProductoDao
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listar()
    {
        $sql = "SELECT id, nombre, precio, stock FROM producto ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $productos = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new Producto($fila["id"], $fila["nombre"], $fila["precio"], $fila["stock"]);
        }
        return $productos;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT id, nombre, precio, stock FROM producto WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["id" => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Producto($fila["id"], $fila["nombre"], $fila["precio"], $fila["stock"]);
        }
        return null;
    }

    public function insertar(Producto $producto)
    {
        $sql = "INSERT INTO producto (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            "nombre" => $producto->getNombre(),
            "precio" => $producto->getPrecio(),
            "stock" => $producto->getStock()
        ]);
    }

    public function actualizar(Producto $producto)
    {
        $sql = "UPDATE producto SET nombre = :nombre, precio = :precio, stock = :stock WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            "id" => $producto->getId(),
            "nombre" => $producto->getNombre(),
            "precio" => $producto->getPrecio(),
            "stock" => $producto->getStock()
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM producto WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute(["id" => $id]);
    }
} // Llave de cierre de la clase al final de todo
