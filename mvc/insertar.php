<?php
require_once 'configdb.php';
require_once __DIR__ . '/modelo/asignaturas.php';
require_once __DIR__ . '/controlador/c-asignatura.php';

Controlador::insertar($conexion);
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir asignatura</title>
</head>
<body>
    <h1>Añadir asignatura</h1>
    <form method="POST" action="insertar.php">
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="color" placeholder="Color (hex sin #)" required><br>
        <button type="submit">Guardar</button>
    </form>
    <p><a href="index.php">Volver al menú</a></p>
</body>
</html>