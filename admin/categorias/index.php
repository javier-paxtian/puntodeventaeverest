<?php
require_once '../../db/controller/CategoriaController.php';
$categoriaController = new CategoriaController();
$categorias = $categoriaController->obtenerTodasLasCategorias();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../../global/CNDsHead.php'; ?>
</head>

<body>

    <div class="w-[90%] m-auto mt-[50px]">
        <a type="button" href="agregar.php"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear
            nuevo</a>

        <div class="relative overflow-x-auto mt-[30px]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categorias as $categoria) {
                        ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $categoria['id']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $categoria['nombre']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <a type="button" href="/admin/categorias/editar.php?id=<?= $categoria['id'] ?>"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editar</a>
                                <a type="button" href="/admin/categorias/eliminar.php?id=<?= $categoria['id'] ?>"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>