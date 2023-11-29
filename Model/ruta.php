<?php
require_once "../Config/Conexion.php";
class ruta {
    private $idRuta;
    private $nombreRuta;
    private $recorridoRuta;
    private $ubicacionRuta;
    private $vehiculo_idvehiculo;

    // Getters
    public function getIdRuta() {
        return $this->idRuta;
    }

    public function getNombreRuta() {
        return $this->nombreRuta;
    }

    public function getRecorridoRuta() {
        return $this->recorridoRuta;
    }

    public function getUbicacionRuta() {
        return $this->ubicacionRuta;
    }

    public function getVehiculo_idvehiculo() {
        return $this->vehiculo_idvehiculo;
    }

    // Setters
    public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    public function setNombreRuta($nombreRuta) {
        $this->nombreRuta = $nombreRuta;
    }

    public function setRecorridoRuta($recorridoRuta) {
        $this->recorridoRuta = $recorridoRuta;
    }

    public function setUbicacionRuta($ubicacionRuta) {
        $this->ubicacionRuta = $ubicacionRuta;
    }

    public function setVehiculo_idvehiculo($vehiculo_idvehiculo) {
        $this->vehiculo_idvehiculo = $vehiculo_idvehiculo;
    }
}
?>