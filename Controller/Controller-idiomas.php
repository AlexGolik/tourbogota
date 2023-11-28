<?php
// Inicia el buffer de salida
ob_start();

// Tu código aquí
require_once("../Model/idioma.php");

// Verifica si se han enviado datos mediante el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los campos necesarios están presentes en $_POST
    if (
        isset($_POST['nombre']) &&
        isset($_POST['nivel']) &&
        isset($_POST['persona_idpersona'])
    ) {
        // Crea una instancia de Persona con los datos del formulario
        $idiomas = new Idiomas(
            "",
            $_POST['nombre'],
            $_POST['nivel'],
            $_POST['persona_idpersona'],
        );

        // Intenta guardar la instancia de Persona en la base de datos
        try {
            $persona->guardar();

            // Redirige a la misma página después de la operación exitosa
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } catch (PDOException $e) {
            echo "Error al guardar la persona: " . $e->getMessage();
        }
    } else {
        echo "Todos los campos del formulario son obligatorios.";
    }
}
