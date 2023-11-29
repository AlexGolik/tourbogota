<?php
require_once "../Config/Conexion.php";

class reservas {
    private $idReservas;
    private $fechaReserva;
    private $cantidadTuristas;
    private $costoTotal;
    private $descripcion;
    private $Planes_idPlanes;
    private $estado_idestado;

    // Getters
    public function getIdReservas() {
        return $this->idReservas;
    }

    public function getFechaReserva() {
        return $this->fechaReserva;
    }

    public function getCantidadTuristas() {
        return $this->cantidadTuristas;
    }

    public function getCostoTotal() {
        return $this->costoTotal;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPlanes_idPlanes() {
        return $this->Planes_idPlanes;
    }

    public function getEstado_idestado() {
        return $this->estado_idestado;
    }

    // Setters
    public function setIdReservas($idReservas) {
        $this->idReservas = $idReservas;
    }

    public function setFechaReserva($fechaReserva) {
        $this->fechaReserva = $fechaReserva;
    }

    public function setCantidadTuristas($cantidadTuristas) {
        $this->cantidadTuristas = $cantidadTuristas;
    }

    public function setCostoTotal($costoTotal) {
        $this->costoTotal = $costoTotal;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPlanes_idPlanes($Planes_idPlanes) {
        $this->Planes_idPlanes = $Planes_idPlanes;
    }

    public function setEstado_idestado($estado_idestado) {
        $this->estado_idestado = $estado_idestado;
    }
    public function hacerReserva($fechaReserva, $cantidadTuristas, $costoTotal, $descripcion, $Planes_idPlanes) {
        $conexion = new Conexion();
    
        // Obtener el estado_idestado inicial (puedes ajustar esto según tu lógica)
        $estado_idestado = 1; // Por ejemplo, estado activo
    
        // Insertar la reserva en la base de datos
        $query = "INSERT INTO reservas (fechaReserva, cantidadTuristas, costoTotal, descripcion, Planes_idPlanes, estado_idestado) 
                    VALUES ('$fechaReserva', $cantidadTuristas, $costoTotal, '$descripcion', $Planes_idPlanes, $estado_idestado)";
    
        $resultado = $conexion->ejecutarQuery($query);
    
        if ($resultado) {
            // La reserva se realizó con éxito
            return true;
        } else {
            // Error al hacer la reserva
            return false;
        }
    }
}

?>