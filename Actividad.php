<?php
        require_once 'Conexion.php';
            class Actividad {   
                    private $IdActividad;
                    private $Nombre;
                    private $Duracion;
                  const TABLA = 'Actividad';
                  public function getIdActividad() {
                     return $this->IdActividad;
                  }
                  public function getNombre() {
                     return $this->Nombre;
                  }
                  public function getDuracion() {
                     return $this->Duracion;
                  }
                 public function setIdActividad($IdActividad) {
                    $this->IdActividad = $IdActividad;
                 }
                 public function setNombre($Nombre) {
                    $this->Nombre = $Nombre;
                 }
                 public function setDuracion($Duracion) {
                    $this->Duracion = $Duracion;
                 }
                  
                  public function __construct($IdActividad=null, $Nombre, $Duracion) {
                     $this->IdActividad = $IdActividad;
                     $this->Nombre = $Nombre;
                     $this->Duracion = $Duracion;
                  }
                }
               ?> 