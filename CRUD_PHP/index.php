<?php

require_once "config/Database.php";
require_once "modelo/Producto.php";
require_once "modelo/ProductoDao.php";
require_once "controlador/ProductoController.php";

// Conexión a la base de datos
$database = new Database();
$conexion = $database->conectar();

// Objeto para trabajar con productos
$dao = new ProductoDao($conexion);

// Controlador
$controlador = new ProductoController($dao);

// Acción solicitada
$accion = $_GET["accion"] ?? "index";

// Ejecutar acción
switch ($accion) {
    case "guardar":
        $controlador->guardar();
        break;

    case "editar":
        $controlador->editar();
        break;

    case "actualizar":
        $controlador->actualizar();
        break;

    case "eliminar":
        $controlador->eliminar();
        break;

    default:
        $controlador->index();
        break;
}
