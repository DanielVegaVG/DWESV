<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Añadir Asignatura</h1>
    <form method="POST" action="../procesos/guardar_asignatura.php">
        <input type="text" name="nombre" placeholder="Nombre"
               value=""><br>
        <input type="text" name="abreviatura" placeholder="Abreviatura (máx 10)"
               value=""><br>
        <input type="submit" value="añadir"></input>
    </form>
    <p><a href="../procesos/listar_asignaturas.php">Volver al listado</a></p>
</body>
</html>