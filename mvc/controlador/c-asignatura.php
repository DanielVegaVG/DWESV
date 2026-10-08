<?php
class Controlador {
    public static function insertar($conexion) {
        if (isset($_POST['nombre']) && isset($_POST['color'])) {
            insertarAsignatura($conexion, $_POST['nombre'], $_POST['color']);
        }
    }

    public static function listar($conexion) {
        return obtenerAsignaturas($conexion);
    }

    public static function obtener($conexion, $id) {
        return obtenerAsignatura($conexion, $id);
    }

    public static function modificar($conexion, $id, $nombre, $color) {
        return actualizarAsignatura($conexion, $id, $nombre, $color);
    }
}
?>