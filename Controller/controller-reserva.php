<?php
// Inicia el buffer de salida
ob_start();

// Tu código aquí
require_once("../Model/reservas.php");

// Verifica si se han enviado datos mediante el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los campos necesarios están presentes en $_POST
    if (
        isset($_POST['fechaReserva']) &&
        isset($_POST['cantidadTuristas']) &&
        isset($_POST['costoTotal']) &&
        isset($_POST['descripcion']) &&
        isset($_POST['Planes_idPlanes'])
    ) {
        // Crea una instancia de la clase Reservas con los datos del formulario
        $reserva = new reservas();
        $reserva->setFechaReserva($_POST['fechaReserva']);
        $reserva->setCantidadTuristas($_POST['cantidadTuristas']);
        $reserva->setCostoTotal($_POST['costoTotal']);
        $reserva->setDescripcion($_POST['descripcion']);
        $reserva->setPlanes_idPlanes($_POST['Planes_idPlanes']);

        // Intenta hacer la reserva
        try {
            // Llamada al método hacerReserva
            if ($reserva->hacerReserva($reserva->getFechaReserva(), $reserva->getCantidadTuristas(), $reserva->getCostoTotal(), $reserva->getDescripcion(), $reserva->getPlanes_idPlanes())) {
                // Redirige a la misma página después de la operación exitosa
                header("Location:../Views/reserva.php");
                exit();
            } else {
                echo "Error al hacer la reserva.";
            }
        } catch (PDOException $e) {
            echo "Error al hacer la reserva: " . $e->getMessage();
        }
    } else {
        echo "Todos los campos del formulario son obligatorios.";
    }
}
?>
