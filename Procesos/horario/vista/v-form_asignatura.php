<?php
$esModificar = isset($asignatura) && $asignatura !== null;
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title><?php echo $esModificar ? 'Modificar' : 'Añadir'; ?> asignatura</title></head>
<body>
    <h1><?php echo $esModificar ? 'Modificar asignatura' : 'Añadir asignatura'; ?></h1>

    <form method="POST" action="../procesos/guardar_asignatura.php">
        <?php if ($esModificar) { ?>
            <input type="hidden" name="id" value="<?php echo $asignatura['id']; ?>">
        <?php } ?>

        <input type="text" name="nombre" placeholder="Nombre"
               value="<?php echo isset($asignatura['nombre']) ? $asignatura['nombre'] : ''; ?>"><br>
        <input type="text" name="abreviatura" placeholder="Abreviatura (máx 10)"
               value="<?php echo isset($asignatura['abreviatura']) ? $asignatura['abreviatura'] : ''; ?>"><br>
        <button type="submit"><?php echo $esModificar ? 'Guardar cambios' : 'Añadir'; ?></button>
    </form>

    <p><a href="../procesos/listar_asignaturas.php">Volver al listado</a></p>
</body>
</html>