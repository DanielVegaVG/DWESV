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

        $nombre= $_POST['nombre'] ?? '';
        $abreviatura = $_POST['abreviatura'] ?? '';
        $id= $_POST['id'] ?? null;

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