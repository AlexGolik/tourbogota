<?php
// Inicia el buffer de salida
ob_start();

// Tu código aquí
require_once("../Model/Persona.php");

// Verifica si se han enviado datos mediante el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los campos necesarios están presentes en $_POST
    if (
        isset($_POST['nombres']) &&
        isset($_POST['apellidos']) &&
        isset($_POST['genero']) &&
        isset($_POST['nacionalidad']) &&
        isset($_POST['correo']) &&
        isset($_POST['telefono']) &&
        isset($_POST['estado_idestado']) &&
        isset($_POST['Roles_idRoles'])
    ) {
        // Crea una instancia de Persona con los datos del formulario
        $persona = new Persona(
            "",
            $_POST['nombres'],
            $_POST['apellidos'],
            $_POST['genero'],
            $_POST['nacionalidad'],
            $_POST['correo'],
            $_POST['telefono'],
            $_POST['estado_idestado'],
            $_POST['Roles_idRoles']
        );

        // Intenta guardar la instancia de Persona en la base de datos
        try {
            $persona->guardar();

            // Redirige a la misma página después de la operación exitosa
            header("Location:../Views/persona.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al guardar la persona: " . $e->getMessage();
        }
    } else {
        echo "Todos los campos del formulario son obligatorios.";
    }
}
