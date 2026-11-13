<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar asignatura</title>
</head>
<body>
    <h1>Eliminar asignatura</h1>
    <p>¿Quieres borrar <strong><?php echo $asignatura['nombre']; ?></strong>?</p>

    <form method="POST" action="../index.php?controlador=c_asignatura&metodo=borrar&id=<?php echo $asignatura['id']; ?>">
        <input type="submit" value="Sí"></input>
        <a href="../index.php?controlador=c_asignatura&metodo=listar">Cancelar</a>
    </form>
</body>
</html>