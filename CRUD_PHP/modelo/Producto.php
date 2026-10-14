<?php
class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $stock;

    public function __construct($id = null, $nombre = "", $precio = 0, $stock = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getPrecio() { return $this->precio; }
    public function getStock() { return $this->stock; }

    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setStock($stock) { $this->stock = $stock; }
}
