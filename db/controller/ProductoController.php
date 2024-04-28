<?php
require_once dirname(__FILE__) . '/../Database.php';
require_once dirname(__FILE__) . '/../model/Producto.php';

class ProductoController
{
    private $conexion;

    // Constructor que inicializa la conexión a la base de datos
    public function __construct()
    {
        $this->conexion = new Database();
        $this->conexion->conectar();
    }

    // Método para obtener todas las categorías
    public function obtenerTodasLasProductos()
    {
        $sql = "SELECT * FROM productos";
        $resultado = $this->conexion->consultar($sql);
        // Procesar el resultado y devolver las categorías
        $productos = [];
        while ($fila = $resultado->fetch_assoc()) {
            // Crear objetos Producto y agregarlos al array            
            $productos[] = array(
                "id" => $fila['id'],
                "nombre" => $fila['nombre'],
                "descripcion" => $fila['descripcion'],
                "preciocompra" => $fila['preciocompra'],
                "precioventa" => $fila['precioventa'],
                "stock" => $fila['stock'],
                "fecha_creacion" => $fila['fecha_creacion'],
            );
        }
        return $productos;
    }

    // Método para obtener una categoría por su ID
    public function obtenerProductoPorId($id)
    {
        $sql = "SELECT * FROM productos WHERE id = $id";
        $resultado = $this->conexion->consultar($sql);
        if ($resultado->num_rows == 1) {
            $fila = $resultado->fetch_assoc();
            return $productos[] = array(
                "id" => $fila['id'],
                "idcategorias" => $fila['idcategorias'],
                "nombre" => $fila['nombre'],
                "descripcion" => $fila['descripcion'],
                "preciocompra" => $fila['preciocompra'],
                "precioventa" => $fila['precioventa'],
                "stock" => $fila['stock'],
                "fecha_creacion" => $fila['fecha_creacion'],
            );
        } else {
            return null; // La categoría no existe
        }
    }

    // Método para agregar una nueva categoría
    public function agregarProducto($idcategorias, $nombre, $descripcion, $preciocompra, $precioventa, $stock)
    {
        // Escapar los valores para prevenir inyección SQL
        $nombre = $this->conexion->escapar($nombre);
        $descripcion = $this->conexion->escapar($descripcion);
        // Podrías también escapar $preciocompra, $precioventa, $stock si son entradas del usuario que necesitan ser protegidas
        // Construir la consulta SQL para insertar el producto
        $sql = "INSERT INTO productos (idcategorias, nombre, descripcion, preciocompra, precioventa, stock, fecha_creacion) 
                VALUES ('$idcategorias', '$nombre', '$descripcion', '$preciocompra', '$precioventa', '$stock', NOW())";
        // Ejecutar la consulta SQL
        $resultado = $this->conexion->consultar($sql);
        // Verificar si la consulta se ejecutó correctamente
        if ($resultado) {
            return true; // Producto agregado exitosamente
        } else {
            return false; // Error al agregar el producto
        }
    }

    // Método para actualizar una categoría existente
    public function actualizarProducto($id, $idCategoria, $nuevoNombre, $nuevaDescripcion, $nuevoPrecioCompra, $nuevoPrecioVenta, $nuevoStock)
    {
        // Escapar los valores para prevenir inyección SQL
        $idCategoria = $this->conexion->escapar($idCategoria);
        $nuevoNombre = $this->conexion->escapar($nuevoNombre);
        $nuevaDescripcion = $this->conexion->escapar($nuevaDescripcion);
        $nuevoPrecioCompra = $this->conexion->escapar($nuevoPrecioCompra);
        $nuevoPrecioVenta = $this->conexion->escapar($nuevoPrecioVenta);
        $nuevoStock = $this->conexion->escapar($nuevoStock);

        // Construir la consulta SQL para actualizar el producto
        $sql = "UPDATE productos SET idcategorias = '$idCategoria', nombre = '$nuevoNombre', descripcion = '$nuevaDescripcion', 
                preciocompra = '$nuevoPrecioCompra', precioventa = '$nuevoPrecioVenta', 
                stock = '$nuevoStock' WHERE id = $id";

        // Ejecutar la consulta SQL
        $resultado = $this->conexion->consultar($sql);

        // Verificar si la consulta se ejecutó correctamente
        if ($resultado) {
            return true; // Producto actualizado exitosamente
        } else {
            return false; // Error al actualizar el producto
        }
    }



    // Método para eliminar una categoría
    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM productos WHERE id = $id";
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