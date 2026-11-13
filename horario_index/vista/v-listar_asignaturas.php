<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado asignaturas</title>
</head>
<body>
    <h1>Listado de asignaturas</h1>
    <p><a href="../procesos/pedir_datos_asignaturas.php">+ Nueva asignatura</a></p>
    <table>
        <tr><th>Nombre</th><th>Abreviatura</th><th>Acciones</th></tr>
        <?php foreach ($asignatura as $fila) { ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['abreviatura']; ?></td>
                <td>
                    <?php echo '<a href="../index.php?controlador=./controlador/c_asignatura&metodo=modificar&id='.$fila['id'].'">Modificar</a>'; ?> |
                    <?php echo '<a href="../index.php?controlador=./controlador/c_asignatura&metodo=borrar&id='.$fila['id'].'">Borrar</a>'; ?>
                </td>
            </tr>
        <?php } ?>
        <?php if (empty($asignatura)) { ?>
            <tr><td colspan="3">No hay asignaturas.</td></tr>
        <?php } ?>  
    </table>
</body>
</html>