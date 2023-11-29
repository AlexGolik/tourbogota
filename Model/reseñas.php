<?php
require_once "../Config/Conexion.php";

class reseñas {
    private $idReseñas;
    private $descripcionReseñas;
    private $calificacionReseñas;
    private $Planes_idPlanes;

    // Getters
    public function getIdReseñas() {
        return $this->idReseñas;
    }

    public function getDescripcionReseñas() {
        return $this->descripcionReseñas;
    }

    public function getCalificacionReseñas() {
        return $this->calificacionReseñas;
    }

    public function getPlanes_idPlanes() {
        return $this->Planes_idPlanes;
    }

    // Setters
    public function setIdReseñas($idReseñas) {
        $this->idReseñas = $idReseñas;
    }

    public function setDescripcionReseñas($descripcionReseñas) {
        $this->descripcionReseñas = $descripcionReseñas;
    }

    public function setCalificacionReseñas($calificacionReseñas) {
        $this->calificacionReseñas = $calificacionReseñas;
    }

    public function setPlanes_idPlanes($Planes_idPlanes) {
        $this->Planes_idPlanes = $Planes_idPlanes;
    }
}
?>