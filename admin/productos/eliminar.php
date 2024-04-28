<?php
require_once '../../db/controller/CategoriaController.php';
$categoriaController = new CategoriaController();
$categoria = $categoriaController->obtenerCategoriaPorId($_GET['id']);
if (!empty($_GET['id'])) {        
    $categoriaController->eliminarCategoria($_GET['id']);
    echo "Se elimino correctamente";
    set_time_limit(1.5);
    header("Refresh: 1.5; url=/admin/categorias/");
    exit;
}
