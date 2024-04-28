<?php
require_once '../../db/controller/CategoriaController.php';
require_once '../../db/controller/ProductoController.php';
$categoriaController = new CategoriaController();
$categorias = $categoriaController->obtenerTodasLasCategorias();
$productoController = new ProductoController();
$producto = $productoController->obtenerProductoPorId($_GET['id']);
if (!empty($_POST['idcategorias']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['preciocompra']) && !empty($_POST['precioventa']) && !empty($_POST['stock'])) {
    $productoController->actualizarProducto($_GET['id'], $_POST['idcategorias'], $_POST['nombre'], $_POST['descripcion'], $_POST['preciocompra'], $_POST['precioventa'], $_POST['stock']);
    echo "Se edito correctamente";
    set_time_limit(1.5);
    header("Refresh: 1.5; url=/admin/productos/");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Incluir Tailwind CSS -->
    <?php require_once '../../global/CNDsHead.php'; ?>
</head>

<body class="bg-gray-100">
    <div class="mx-auto mt-8 w-[90%]">
        <h1 class="text-2xl font-bold mb-4">Editar</h1>
        <!-- Formulario de agregar producto -->
        <form action="editar.php?id=<?= $_GET['id'] ?>" method="POST" class="w-full">
            <!-- Nombre de la producto -->
            <div class="mb-4 flex flex-col gap-y-[10px]">
                <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Ingrese el nombre de la producto" require>
                <input type="text" id="descripcion" name="descripcion" value="<?= $producto['descripcion'] ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Ingrese el descripcion de la producto" require>
                <input type="number" id="preciocompra" name="preciocompra" value="<?= $producto['preciocompra'] ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Ingrese el preciocompra de la producto" require>
                <input type="number" id="precioventa" name="precioventa" value="<?= $producto['precioventa'] ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Ingrese el precioventa de la producto" require>
                <input type="number" id="stock" name="stock" value="<?= $producto['stock'] ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Ingrese el stock de la producto" require>
                <select id="idcategorias" name="idcategorias"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected value="">Selecciona una categoría</option>
                    <?php
                    if (isset($categorias) && is_array($categorias)) {
                        foreach ($categorias as $categoria) {
                            ?>
                            <option value="<?= $categoria['id']; ?>"><?= $categoria['nombre']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

            </div>
            <!-- Botón de enviar -->
            <div class="flex items-center gap-x-[40px]">
                <a type="button" href="/admin/productos/"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Regresar</a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editar</button>
            </div>
        </form>
    </div>
</body>

</html>