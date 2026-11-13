<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
</head>
<body>
    <h1>Modificar asignatura</h1>
    <form method="POST" action="../index.php?controlador=./controlador/c_asignatura&metodo=guardar">
        <input type="hidden" name="id" value="<?php echo $asignatura['id']; ?>">
        <input type="text" name="nombre" placeholder="Nombre"
               value="<?php echo ($asignatura['nombre']);?>" require><br>
        <input type="text" name="abreviatura" maxlength="6" placeholder="Abreviatura (máx 6)"
               value="<?php echo ($asignatura['abreviatura']);?>" require><br>
        <input type="submit" value="Guardar cambios"></input>
    </form>
    <p><a href="../index.php?controlador=./controlador/c_asignatura&metodo=listar">Volver al listado</a></p>
</body>
</html>