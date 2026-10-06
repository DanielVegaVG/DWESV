<?php
require_once __DIR__ . '/../configdb.php';

function obtenerAsignaturas($conexion) {
    $consulta = 'SELECT nombre, color FROM asignatura';
    $resultado = $conexion->query($consulta);

    $asignaturas = [];
    while ($fila = $resultado->fetch_array()) {
        $asignaturas[] = $fila;
    }
    return $asignaturas;
}
function insertarAsignatura($conexion, $nombre, $color) {
    $consulta = "INSERT INTO asignatura (nombre, color) VALUES ('$nombre', '$color')";
    return $conexion->query($consulta);
}