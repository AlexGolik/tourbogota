<?php

require_once "../Config/Conexion.php";
class Vehiculo {
    private $idVehiculo;
    private $marca;
    private $modelo;
    private $fechaFabricacionVehiculo;
    private $tipoVehiculo;
    private $ocupacionVehiculo;
    private $capacidadEquipajeVehiculo;
    private $persona_idpersona;

    // Getters
    public function getIdVehiculo() {
        return $this->idVehiculo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getFechaFabricacionVehiculo() {
        return $this->fechaFabricacionVehiculo;
    }

    public function getTipoVehiculo() {
        return $this->tipoVehiculo;
    }

    public function getOcupacionVehiculo() {
        return $this->ocupacionVehiculo;
    }

    public function getCapacidadEquipajeVehiculo() {
        return $this->capacidadEquipajeVehiculo;
    }

    public function getPersona_idpersona() {
        return $this->persona_idpersona;
    }

    // Setters
    public function setIdVehiculo($idVehiculo) {
        $this->idVehiculo = $idVehiculo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setFechaFabricacionVehiculo($fechaFabricacionVehiculo) {
        $this->fechaFabricacionVehiculo = $fechaFabricacionVehiculo;
    }

    public function setTipoVehiculo($tipoVehiculo) {
        $this->tipoVehiculo = $tipoVehiculo;
    }

    public function setOcupacionVehiculo($ocupacionVehiculo) {
        $this->ocupacionVehiculo = $ocupacionVehiculo;
    }

    public function setCapacidadEquipajeVehiculo($capacidadEquipajeVehiculo) {
        $this->capacidadEquipajeVehiculo = $capacidadEquipajeVehiculo;
    }

    public function setPersona_idpersona($persona_idpersona) {
        $this->persona_idpersona = $persona_idpersona;
    }
}
?>