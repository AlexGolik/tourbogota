<?php

require_once "../Config/Conexion.php";
class Persona {
    private $idpersona;
    private $nombres; 
    private $apellidos; 
    private $genero;
    private $nacionalidad; 
    private $correo;
    private $telefono; 
    private $estado_idestado; 
    private $Roles_idRoles;
    const TABLA = "persona";

    // Getter para idpersona
    public function getIdPersona() {
        return $this->idpersona;
    }

    // Setter para idpersona
    public function setIdPersona($idpersona) {
        $this->idpersona = $idpersona;
    }

    // Getter para nombres
    public function getNombres() {
        return $this->nombres;
    }

    // Setter para nombres
    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    // Repite este patrón para los demás atributos...

    // Getter para Roles_idRoles
    public function getRolesIdRoles() {
        return $this->Roles_idRoles;
    }

    // Setter para Roles_idRoles
    public function setRolesIdRoles($Roles_idRoles) {
        $this->Roles_idRoles = $Roles_idRoles;
    }

    // Constructor
    public function __construct(
        $idpersona=null, $nombres, $apellidos, 
        $genero, $nacionalidad, $correo, 
        $telefono, $estado_idestado, $Roles_idRoles
    ) {
        $this->idpersona = $idpersona;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
        $this->nacionalidad = $nacionalidad;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->estado_idestado = $estado_idestado;
        $this->Roles_idRoles = $Roles_idRoles;
    }

    public function guardar(){
        $conexion = new Conexion();
    
        if($this->idpersona) /*Modificar*/ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombres = :nombres, apellidos = :apellidos, genero = :genero, nacionalidad = :nacionalidad, correo = :correo, telefono = :telefono, estado_idestado = :estado_idestado, Roles_idRoles = :Roles_idRoles WHERE idpersona = :idpersona');
            $consulta->bindParam(":nombres", $this->nombres);
            $consulta->bindParam(":apellidos", $this->apellidos);
            $consulta->bindParam(":genero", $this->genero);
            $consulta->bindParam(":nacionalidad", $this->nacionalidad);
            $consulta->bindParam(":correo", $this->correo);
            $consulta->bindParam(":telefono", $this->telefono);
            $consulta->bindParam(":estado_idestado", $this->estado_idestado);
            $consulta->bindParam(":Roles_idRoles", $this->Roles_idRoles);
            $consulta->bindParam(':idpersona', $this->idpersona);
            $consulta->execute();
        } else /*Insertar*/ {
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA . "(nombres, apellidos, genero, nacionalidad, correo, telefono, estado_idestado, Roles_idRoles) VALUES(:nombres, :apellidos, :genero, :nacionalidad, :correo, :telefono, :estado_idestado, :Roles_idRoles)");
            $consulta->bindParam(":nombres", $this->nombres);
            $consulta->bindParam(":apellidos", $this->apellidos);
            $consulta->bindParam(":genero", $this->genero);
            $consulta->bindParam(":nacionalidad", $this->nacionalidad);
            $consulta->bindParam(":correo", $this->correo);
            $consulta->bindParam(":telefono", $this->telefono);
            $consulta->bindParam(":estado_idestado", $this->estado_idestado);
            $consulta->bindParam(":Roles_idRoles", $this->Roles_idRoles);
            $consulta->execute();
            $this->idpersona = $conexion->lastInsertId();
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