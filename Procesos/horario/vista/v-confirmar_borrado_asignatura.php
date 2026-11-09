<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar asignatura</title>
</head>
<body>
    <h1>Eliminar asignatura</h1>
    <p>¿Seguro que quieres borrar <strong><?php echo $asignatura['nombre']; ?></strong>?</p>

    <form method="POST" action="../procesos/borrar_asignatura.php?id=<?php echo $asignatura['id']; ?>">
        <input type="submit">Sí</input>
        <a href="../procesos/listar_asignaturas.php">Cancelar</a>
    </form>
</body>
</html>