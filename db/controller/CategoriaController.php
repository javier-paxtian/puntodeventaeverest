<?php
require_once dirname(__FILE__) . '/../Database.php';
require_once dirname(__FILE__) . '/../model/Categoria.php';

class CategoriaController
{
    private $conexion;

    // Constructor que inicializa la conexión a la base de datos
    public function __construct()
    {
        $this->conexion = new Database();
        $this->conexion->conectar();
    }

    // Método para obtener todas las categorías
    public function obtenerTodasLasCategorias()
    {
        $sql = "SELECT * FROM categorias";
        $resultado = $this->conexion->consultar($sql);
        // Procesar el resultado y devolver las categorías
        $categorias = [];
        while ($fila = $resultado->fetch_assoc()) {
            // Crear objetos Categoria y agregarlos al array            
            $categorias[] = array(
                "id" => $fila['id'],
                "nombre" => $fila['nombre'],
            );
        }
        return $categorias;
    }

    // Método para obtener una categoría por su ID
    public function obtenerCategoriaPorId($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = $id";
        $resultado = $this->conexion->consultar($sql);
        if ($resultado->num_rows == 1) {
            $fila = $resultado->fetch_assoc();            
            return $categorias[] = array(
                "id" => $fila['id'],
                "nombre" => $fila['nombre'],
            );
        } else {
            return null; // La categoría no existe
        }
    }

    // Método para agregar una nueva categoría
    public function agregarCategoria($nombre)
    {
        $nombre = $this->conexion->escapar($nombre);
        $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre')";
        $resultado = $this->conexion->consultar($sql);
        if ($resultado) {
            return true; // Categoría agregada exitosamente
        } else {
            return false; // Error al agregar la categoría
        }
    }

    // Método para actualizar una categoría existente
    public function actualizarCategoria($id, $nuevoNombre)
    {
        $nuevoNombre = $this->conexion->escapar($nuevoNombre);
        $sql = "UPDATE categorias SET nombre = '$nuevoNombre' WHERE id = $id";
        $resultado = $this->conexion->consultar($sql);
        if ($resultado) {
            return true; // Categoría actualizada exitosamente
        } else {
            return false; // Error al actualizar la categoría
        }
    }

    // Método para eliminar una categoría
    public function eliminarCategoria($id)
    {
        $sql = "DELETE FROM categorias WHERE id = $id";
        $resultado = $this->conexion->consultar($sql);
        if ($resultado) {
            return true; // Categoría eliminada exitosamente
        } else {
            return false; // Error al eliminar la categoría
        }
    }

    // Método para cerrar la conexión a la base de datos
    public function __destruct()
    {
        $this->conexion->cerrar();
    }
}