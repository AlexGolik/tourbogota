<?php
require_once "../Config/Conexion.php";

class garantia {
    private $idGarantia;
    private $fecha;
    private $descripcion;
    private $Planes_idPlanes;

    // Getters
    public function getIdGarantia() {
        return $this->idGarantia;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPlanes_idPlanes() {
        return $this->Planes_idPlanes;
    }

    // Setters
    public function setIdGarantia($idGarantia) {
        $this->idGarantia = $idGarantia;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPlanes_idPlanes($Planes_idPlanes) {
        $this->Planes_idPlanes = $Planes_idPlanes;
    }
}

?>