<?php
require_once "../Config/Conexion.php";
class Roles {
    private $idRoles; 
    private $nombreRoles;
    const TABLA = "roles";

    // Getter's
    public function getIdRoles() {
        return $this->idRoles;
    }

    public function getNombreRoles() {
        return $this->nombreRoles;
    }


    // Constructor
    public function __construct(
        $idRoles=null, $nombreRoles
    ) {
        $this->idRoles = $idRoles;
        $this->nombreRoles = $nombreRoles;
    }

    public static function mostrar(){

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT idRoles, nombreRoles FROM '. self::TABLA . ' ORDER BY nombreRoles');
        $consulta-> execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
}
?>