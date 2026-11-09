<?php
class ControladorAsignatura {
    public $vista;

    public function listar($conexion) {
        $this->vista = "../vista/v-listar_asignaturas.php";
        return obtenerAsignaturas($conexion);
    }

    public function pedirDatos() {
        $this->vista = "../vista/v-form_asignatura.php";
        return null;
    }

    public function guardar($conexion) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: pedir_datos_asignaturas.php');
            exit;
        }

        $nombre = $_POST['nombre'] ?? '';
        $abreviatura = $_POST['abreviatura'] ?? '';
        $id = $_POST['id'] ?? null;

        if ($id !== null) {
            actualizarAsignatura($conexion, $id, $nombre, $abreviatura);
        } else {
            insertarAsignatura($conexion, $nombre, $abreviatura);
        }
        header('Location: listar_asignaturas.php');
        $this->vista = "../vista/v-listar_asignaturas.php";
    }

    public function borrar($conexion, $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            borrarAsignatura($conexion, $id);
            header('Location: listar_asignaturas.php');
            exit;
        }
        $this->vista = "../vista/v-confirmar_borrado_asignatura.php";
        return obtenerAsignatura($conexion, $id);
    }

    public function mostrarParaModificar($conexion, $id) {
        $this->vista = "../vista/v-form_asignatura.php";
        return obtenerAsignatura($conexion, $id);
    }
}
?>