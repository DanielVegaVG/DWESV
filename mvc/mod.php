<?php
require "configdb.php";
require "./modelo/asignaturas.php";
require "./controlador/c-asignatura.php";

// Datos que vienen por GET
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$color = $_GET['color'];

// Si viene "modificar", es que han pulsado Guardar → UPDATE directo
if (isset($_GET['modificar'])) {
    Controlador::modificar($conexion, $id, $nombre, $color);
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar asignatura</title>
</head>
<body>
    <h1>Modifica la asignatura</h1>
    <form action="mod.php" method="GET">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="modificar" value="1">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <br>
        <label>Color:</label>
        <input type="text" name="color" value="<?php echo $color; ?>">
        <br>
        <input type="submit">Guardar cambios</input>
    </form>

    <p><a href="listar.php">Volver al listado</a></p>
</body>
</html>