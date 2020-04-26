<?php
        require_once 'Conexion.php';
            class Categoria {   
                    private $IdCategoria;
                    private $EdadMinima;
                    private $EdadMaxima;
                    private $Monitor;
                  const TABLA = 'Categoria';
                  public function getId() {
                     return $this->IdCategoria;
                  }
                  public function getEdadMinima() {
                     return $this->EdadMinima;
                  }
                  public function getEdadMaxima() {
                     return $this->EdadMaxima;
                  }
                  public function getMonitor() {
                    return $this->Monitor;
                 }
                 public function setIdMonitor($IdCategoria) {
                    $this->IdCategoria = $IdCategoria;
                 }
                 public function setEdadMinima($EdadMinima) {
                    $this->EdadMinima = $EdadMinima;
                 }
                 public function setEdadMaxima($EdadMaxima) {
                    $this->EdadMaxima = $EdadMaxima;
                 }
                  public function setProfesion($Monitor) {
                     $this->Monitor= $Monitor;
                  }
                  public function __construct($IdCategoria=null, $EdadMinima, $EdadMaxima, $Monitor ) {
                     $this->IdCategoria = $IdCategoria;
                     $this->EdadMinima = $EdadMinima;
                     $this->EdadMaxima = $EdadMaxima;
                     $this->Monitor = $Monitor;
                  }
                }
               ?> 