<?php
require_once "../Config/Conexion.php";

class planes{
    private $idPlanes;	
	private $nombrePlanes;
	private $detallePlanes; 
	private $tarifaPlanes;	
	private $requisitosEspeciales;
	private $imagenPlanes;
	private $estado_idestado;
	private $tipoDePlan_idTipoDeServicio;

    // Getters
    public function getIdPlanes() {
        return $this->idPlanes;
    }

    public function getNombrePlanes() {
        return $this->nombrePlanes;
    }

    public function getDetallePlanes() {
        return $this->detallePlanes;
    }

    public function getTarifaPlanes() {
        return $this->tarifaPlanes;
    }

    public function getRequisitosEspeciales() {
        return $this->requisitosEspeciales;
    }

    public function getImagenPlanes() {
        return $this->imagenPlanes;
    }

    public function getEstado_idestado() {
        return $this->estado_idestado;
    }

    public function getTipoDePlan_idTipoDeServicio() {
        return $this->tipoDePlan_idTipoDeServicio;
    }

    // Setters
    public function setIdPlanes($idPlanes) {
        $this->idPlanes = $idPlanes;
    }

    public function setNombrePlanes($nombrePlanes) {
        $this->nombrePlanes = $nombrePlanes;
    }

    public function setDetallePlanes($detallePlanes) {
        $this->detallePlanes = $detallePlanes;
    }

    public function setTarifaPlanes($tarifaPlanes) {
        $this->tarifaPlanes = $tarifaPlanes;
    }

    public function setRequisitosEspeciales($requisitosEspeciales) {
        $this->requisitosEspeciales = $requisitosEspeciales;
    }

    public function setImagenPlanes($imagenPlanes) {
        $this->imagenPlanes = $imagenPlanes;
    }

    public function setEstado_idestado($estado_idestado) {
        $this->estado_idestado = $estado_idestado;
    }

    public function setTipoDePlan_idTipoDeServicio($tipoDePlan_idTipoDeServicio) {
        $this->tipoDePlan_idTipoDeServicio = $tipoDePlan_idTipoDeServicio;
    }
}

?>