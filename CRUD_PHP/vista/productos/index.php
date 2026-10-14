<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Habitaciones</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor">

    <div class="encabezado">
        <h1>Gestión de Hotel</h1>
        <button type="button" class="btn btn-nuevo" onclick="abrirModal()">
            + Nuevo producto
        </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($productos)): ?>
                <tr>
                    <td colspan="5" class="sin-productos">
                        No existen productos registrados.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto->getId() ?></td>
                        <td>
                <?= htmlspecialchars($producto->getNombre()) ?>
                        </td>
                        <td>
                   Bs. <?= number_format($producto->getPrecio(), 2) ?>
                        </td>
                        <td><?= $producto->getStock() ?></td>
                        <td>
                            <a href="index.php?accion=editar&id=<?= $producto->getId() ?>"
                               class="btn btn-editar">
                                Editar
                            </a>
                            <a href="index.php?accion=eliminar&id=<?= $producto->getId() ?>"
                               class="btn btn-eliminar"
                               onclick="return confirm('¿Está seguro de eliminar este producto?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- =====================================================
     VENTANA MODAL: NUEVO PRODUCTO
     ===================================================== -->
<div id="modalProducto" class="modal">

    <div class="modal-contenido">

        <div class="modal-encabezado">
            <h2>Nuevo producto</h2>
            <button type="button" class="cerrar" onclick="cerrarModal()">&times;</button>
        </div>
        <form method="POST" action="index.php?accion=guardar">

            <label for="nombre">Nombre:</label>
            <input type="text"
                   id="nombre"
                   name="nombre"
                   required
                   placeholder="Ingrese el nombre del producto">
            <label for="precio">Precio:</label>
            <input type="number"
                   id="precio"
                   name="precio"
                   step="0.01"
                   min="0"
                   required
                   placeholder="0.00">

            <label for="stock">Stock:</label>
            <input type="number"
                   id="stock"
                   name="stock"
                   min="0"
                   required
                   placeholder="0">
            <div class="acciones-formulario">
                <button type="button" class="btn btn-cancelar" onclick="cerrarModal()">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-guardar">
                    Guardar producto
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Abrir la ventana modal
    function abrirModal() {
        document.getElementById("modalProducto").style.display = "flex";
        document.getElementById("nombre").focus();
    }

    // Cerrar la ventana modal
    function cerrarModal() {
        document.getElementById("modalProducto").style.display = "none";
    }

    // Cerrar al hacer clic fuera del contenido
    window.onclick = function(event) {
        const modal = document.getElementById("modalProducto");
        if (event.target === modal) {
            cerrarModal();
        }
    };
</script>

</body>
</html>
