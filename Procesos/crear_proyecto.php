<?php
$base = __DIR__ . '/horario';
$archivos = [

'configdb.php' => <<<'PHP'
<?php
$conexion = new mysqli('127.0.0.1', 'root', '', 'horario');
?>
PHP,

'modelo/asignaturas.php' => <<<'PHP'
<?php
function obtenerAsignaturas($conexion) {
    $consulta = 'SELECT * FROM asignatura';
    $resultado = $conexion->query($consulta);
    $asignaturas = [];
    while ($fila = $resultado->fetch_array()) {
        $asignaturas[] = $fila;
    }
    return $asignaturas;
}

function obtenerAsignatura($conexion, $id) {
    $consulta = "SELECT * FROM asignatura WHERE id = " . $id;
    $resultado = $conexion->query($consulta);
    return $resultado->fetch_array();
}

function insertarAsignatura($conexion, $nombre, $abreviatura) {
    $consulta = "INSERT INTO asignatura (nombre, abreviatura) 
                 VALUES ('$nombre', '$abreviatura')";
    return $conexion->query($consulta);
}

function actualizarAsignatura($conexion, $id, $nombre, $abreviatura) {
    $consulta = "UPDATE asignatura 
                 SET nombre = '$nombre', abreviatura = '$abreviatura' 
                 WHERE id = " . $id;
    return $conexion->query($consulta);
}

function borrarAsignatura($conexion, $id) {
    $consulta = "DELETE FROM asignatura WHERE id = " . $id;
    return $conexion->query($consulta);
}
?>
PHP,

'controlador/c-asignatura.php' => <<<'PHP'
<?php
class ControladorAsignatura {

    public function listar($conexion) {
        return obtenerAsignaturas($conexion);
    }

    public function pedirDatos() {
        return null;
    }

    public function guardar($conexion) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: pedir_datos_asignaturas.php');
            exit;
        }

        $nombre      = $_POST['nombre']      ?? '';
        $abreviatura = $_POST['abreviatura'] ?? '';
        $id          = $_POST['id']          ?? null;

        if ($id !== null) {
            actualizarAsignatura($conexion, $id, $nombre, $abreviatura);
        } else {
            insertarAsignatura($conexion, $nombre, $abreviatura);
        }

        header('Location: listar_asignaturas.php');
        exit;
    }

    public function borrar($conexion, $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            borrarAsignatura($conexion, $id);
            header('Location: listar_asignaturas.php');
            exit;
        }
        return obtenerAsignatura($conexion, $id);
    }

    public function mostrarParaModificar($conexion, $id) {
        return obtenerAsignatura($conexion, $id);
    }
}
?>
PHP,

'vista/v-listar_asignaturas.php' => <<<'PHP'
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Listado asignaturas</title></head>
<body>
    <h1>Listado de asignaturas</h1>
    <p><a href="../procesos/pedir_datos_asignaturas.php">+ Nueva asignatura</a></p>
    <table border="1" cellpadding="8">
        <tr><th>Nombre</th><th>Abreviatura</th><th>Acciones</th></tr>
        <?php foreach ($asignaturas as $fila) { ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['abreviatura']; ?></td>
                <td>
                    <?php echo '<a href="../procesos/mostrar_datos_modificar.php?id='.$fila['id'].'">Modificar</a>'; ?> |
                    <?php echo '<a href="../procesos/borrar_asignatura.php?id='.$fila['id'].'">Borrar</a>'; ?>
                </td>
            </tr>
        <?php } ?>
        <?php if (empty($asignaturas)) { ?>
            <tr><td colspan="3">No hay asignaturas.</td></tr>
        <?php } ?>
    </table>
</body>
</html>
PHP,

'vista/v-form_asignatura.php' => <<<'PHP'
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
PHP,

'vista/v-confirmar_borrado_asignatura.php' => <<<'PHP'
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Eliminar asignatura</title></head>
<body>
    <h1>Eliminar asignatura</h1>
    <p>¿Seguro que quieres borrar <strong><?php echo $asignatura['nombre']; ?></strong>?</p>

    <form method="POST" action="../procesos/borrar_asignatura.php?id=<?php echo $asignatura['id']; ?>">
        <button type="submit">Sí, borrar</button>
        <a href="../procesos/listar_asignaturas.php">Cancelar</a>
    </form>
</body>
</html>
PHP,

'procesos/listar_asignaturas.php' => <<<'PHP'
<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$asignaturas = $controlador->listar($conexion);
require "../vista/v-listar_asignaturas.php";
?>
PHP,

'procesos/pedir_datos_asignaturas.php' => <<<'PHP'
<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$asignatura = $controlador->pedirDatos();
require "../vista/v-form_asignatura.php";
?>
PHP,

'procesos/guardar_asignatura.php' => <<<'PHP'
<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$controlador->guardar($conexion);
?>
PHP,

'procesos/borrar_asignatura.php' => <<<'PHP'
<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$id = $_GET['id'];
$asignatura = $controlador->borrar($conexion, $id);

if (is_array($asignatura)) {
    require "../vista/v-confirmar_borrado_asignatura.php";
}
?>
PHP,

'procesos/mostrar_datos_modificar.php' => <<<'PHP'
<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$id = $_GET['id'];
$asignatura = $controlador->mostrarParaModificar($conexion, $id);
require "../vista/v-form_asignatura.php";
?>
PHP,

];

// Crear carpetas y archivos
foreach ($archivos as $ruta => $contenido) {
    $rutaCompleta = $base . '/' . $ruta;
    if (!is_dir(dirname($rutaCompleta))) {
        mkdir(dirname($rutaCompleta), 0777, true);
    }
    file_put_contents($rutaCompleta, $contenido);
}

// Crear ZIP
$zip = new ZipArchive();
$zipNombre = __DIR__ . '/horario.zip';
if ($zip->open($zipNombre, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
    $iterador = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($base),
        RecursiveIteratorIterator::LEAVES_ONLY
    );
    foreach ($iterador as $archivo) {
        if (!$archivo->isDir()) {
            $rutaAbsoluta  = $archivo->getRealPath();
            $rutaRelativa  = substr($rutaAbsoluta, strlen($base) + 1);
            $zip->addFile($rutaAbsoluta, 'horario/' . $rutaRelativa);
        }
    }
    $zip->close();
    echo "ZIP creado en: <a href='horario.zip'>horario.zip</a>";
} else {
    echo "Error al crear el ZIP";
}
?>