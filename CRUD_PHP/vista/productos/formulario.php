<?php
/** @var Producto $producto */
$editar = $producto->getId() !== null;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editar ? "Editar producto" : "Nuevo producto" ?></title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor formulario">

    <h1><?= $editar ? "Editar producto" : "Nuevo producto" ?></h1>

    <form method="POST"
          action="index.php?accion=<?= $editar ? "actualizar" : "guardar" ?>">

        <?php if ($editar): ?>
            <input type="hidden" name="id" value="<?= $producto->getId() ?>">
        <?php endif; ?>

        <label for="nombre">Nombre:</label>
        <input type="text"
               id="nombre"
               name="nombre"
               required
               value="<?= htmlspecialchars($producto->getNombre()) ?>">

        <label for="precio">Precio:</label>
        <input type="number"
               id="precio"
               name="precio"
               step="0.01"
               min="0"
               required
               value="<?= $producto->getPrecio() ?>">

        <label for="stock">Stock:</label>
        <input type="number"
               id="stock"
               name="stock"
               min="0"
               required
               value="<?= $producto->getStock() ?>">

        <div class="acciones-formulario">
            <a href="index.php" class="btn btn-cancelar">Cancelar</a>

            <button type="submit" class="btn btn-guardar">
                <?= $editar ? "Actualizar" : "Guardar" ?>
            </button>
        </div>

    </form>
</div>

</body>
</html>
