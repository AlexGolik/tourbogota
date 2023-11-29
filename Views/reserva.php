<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
</head>
<body>
    <h2>Formulario de Reserva</h2>

    <form action="../Controller/controller-reserva.php" method="post">
        <label for="fechaReserva">Fecha de Reserva:</label>
        <input type="date" name="fechaReserva" required><br>

        <label for="cantidadTuristas">Cantidad de Turistas:</label>
        <input type="number" name="cantidadTuristas" required><br>

        <label for="costoTotal">Costo Total:</label>
        <input type="number" name="costoTotal" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" rows="4" required></textarea><br>

        <label for="Planes_idPlanes">ID del Plan:</label>
        <input type="number" name="Planes_idPlanes" required><br>

        <input type="submit" value="hacerReserva">
    </form>
</body>
</html>
