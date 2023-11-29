<?php
require_once "../Config/Conexion.php";

class documentos {
    private $iddocumentosVehiculo;
    private $nombreDocumentos;
    private $fechaCreacionDocumentos;
    private $copiaDocumentos;
    private $persona_idpersona;
    private $tipoDeDocumento_idtipoDeDocumento;

    // Getters
    public function getIddocumentosVehiculo() {
        return $this->iddocumentosVehiculo;
    }

    public function getNombreDocumentos() {
        return $this->nombreDocumentos;
    }

    public function getFechaCreacionDocumentos() {
        return $this->fechaCreacionDocumentos;
    }

    public function getCopiaDocumentos() {
        return $this->copiaDocumentos;
    }

    public function getPersona_idpersona() {
        return $this->persona_idpersona;
    }

    public function getTipoDeDocumento_idtipoDeDocumento() {
        return $this->tipoDeDocumento_idtipoDeDocumento;
    }

    // Setters
    public function setIddocumentosVehiculo($iddocumentosVehiculo) {
        $this->iddocumentosVehiculo = $iddocumentosVehiculo;
    }

    public function setNombreDocumentos($nombreDocumentos) {
        $this->nombreDocumentos = $nombreDocumentos;
    }

    public function setFechaCreacionDocumentos($fechaCreacionDocumentos) {
        $this->fechaCreacionDocumentos = $fechaCreacionDocumentos;
    }

    public function setCopiaDocumentos($copiaDocumentos) {
        $this->copiaDocumentos = $copiaDocumentos;
    }

    public function setPersona_idpersona($persona_idpersona) {
        $this->persona_idpersona = $persona_idpersona;
    }

    public function setTipoDeDocumento_idtipoDeDocumento($tipoDeDocumento_idtipoDeDocumento) {
        $this->tipoDeDocumento_idtipoDeDocumento = $tipoDeDocumento_idtipoDeDocumento;
    }
}
?>