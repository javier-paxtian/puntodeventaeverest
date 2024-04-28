<?php
class Database
{
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "1234";
    private $base_de_datos = "puntodeventa";
    private $conexion;

    // Método para conectar a la base de datos
    public function conectar()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->base_de_datos);

        // Verificar si hay errores de conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para ejecutar consultas SQL
    public function consultar($sql)
    {
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    // Método para cerrar la conexión a la base de datos
    public function cerrar()
    {
        $this->conexion->close();
    }

    public function escapar($valor) {
        return $this->conexion->real_escape_string($valor);
    }
}