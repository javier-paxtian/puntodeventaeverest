<?php
require_once '../../db/controller/CategoriaController.php';
$categoriaController = new CategoriaController();
if (!empty($_POST['nombre'])) {
    $categoriaController->agregarCategoria($_POST['nombre']);
    echo "Se agrego correctamente";    
    set_time_limit(1.5);
    header("Refresh: 1.5; url=/admin/categorias/");
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
        <h1 class="text-2xl font-bold mb-4">Agregar</h1>
        <!-- Formulario de agregar categoría -->
        <form action="agregar.php" method="POST" class="w-full">
            <!-- Nombre de la categoría -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
                <input type="text" id="nombre" name="nombre"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Ingrese el nombre de la categoría" required>
            </div>
            <!-- Botón de enviar -->
            <div class="flex items-center gap-x-[40px]">
                <a type="button" href="/admin/categorias/"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Regresar</a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar</button>
            </div>
        </form>
    </div>
</body>

</html>