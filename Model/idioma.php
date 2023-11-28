<?php

require_once "../Config/Conexion.php";
class Idioma{
    private $nombre;
    private $nivel;
    private $persona_idpersona;
    const TABLA = "idiomas";

// Getter y Setter para $nombre
public function getNombre() {
    return $this->nombre;
}

public function setNombre($nombre) {
    $this->nombre = $nombre;
}

// Getter y Setter para $nivel
public function getNivel() {
    return $this->nivel;
}

public function setNivel($nivel) {
    $this->nivel = $nivel;
}

// Getter y Setter para $persona_idpersona
public function getPersonaIdPersona() {
    return $this->persona_idpersona;
}

public function setPersonaIdPersona($persona_idpersona) {
    $this->persona_idpersona = $persona_idpersona;
}

// Constructor
public function __construct($nombre, $nivel, $persona_idpersona) {
    $this->nombre = $nombre;
    $this->nivel = $nivel;
    $this->persona_idpersona = $persona_idpersona;
}

//metodos
public function guardar(){
    $conexion = new Conexion();

    if($this->ididiomas) /*Modificar*/ {
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, nivel = :nivel, persona_idpersona = :persona_idpersona WHERE ididiomas = :ididiomas');
        $consulta->bindParam(":nombre", $this->getNombre());
        $consulta->bindParam(":nivel", $this->getNivel());
        $consulta->bindParam(":persona_idpersona", $this->getPersonaIdPersona());
        $consulta->bindParam(':ididiomas', $this->getIdIdiomas());
        $consulta->execute();
    } else /*Insertar*/ {
        $consulta = $conexion->prepare("INSERT INTO " . self::TABLA . "(nombre, nivel, persona_idpersona) VALUES(:nombre, :nivel, :persona_idpersona)");
        $consulta->bindParam(":nombre", $this->getNombre());
        $consulta->bindParam(":nivel", $this->getNivel());
        $consulta->bindParam(":persona_idpersona", $this->getPersonaIdPersona());
        $consulta->execute();
        $this->setIdIdiomas($conexion->lastInsertId());
    }

    $conexion = null;
}

    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idpersona = :idpersona');
        $consulta->bindParam(':idpersona', $this->idpersona);
        $consulta->execute();
        $conexion = null;
    }
    
    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('
            SELECT p.idpersona, p.nombres, p.apellidos, p.genero, p.nacionalidad, p.correo, p.telefono, e.nombreEstado AS nombreEstado, r.nombreRoles AS nombreRoles
            FROM '. self::TABLA . ' p
            INNER JOIN turismodb.estado e ON p.estado_idestado = e.idestado
            INNER JOIN turismodb.Roles r ON p.Roles_idRoles = r.idRoles
            ORDER BY p.nombres');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
}

?>