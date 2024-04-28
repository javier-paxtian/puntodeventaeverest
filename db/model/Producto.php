<?php

class Producto {
    private $id;
    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $precioCompra;
    private $precioVenta;
    private $stock;
    private $fechaCreacion;

    // Constructor
    public function __construct($id, $idCategoria, $nombre, $descripcion, $precioCompra, $precioVenta, $stock, $fechaCreacion) {
        $this->id = $id;
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precioCompra = $precioCompra;
        $this->precioVenta = $precioVenta;
        $this->stock = $stock;
        $this->fechaCreacion = $fechaCreacion;
    }

    // Métodos getter y setter
    public function getId() {
        return $this->id;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPrecioCompra() {
        return $this->precioCompra;
    }

    public function setPrecioCompra($precioCompra) {
        $this->precioCompra = $precioCompra;
    }

    public function getPrecioVenta() {
        return $this->precioVenta;
    }

    public function setPrecioVenta($precioVenta) {
        $this->precioVenta = $precioVenta;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }
}