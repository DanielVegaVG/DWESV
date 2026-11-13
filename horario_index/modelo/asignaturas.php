<?php
class asignaturas {
    private $conexion;
    public function __construct() {
        require './configdb.php';
        $this->conexion = $conexion;
    }
    function obtenerAsignaturas() {
    $consulta = 'SELECT * FROM asignatura';
    $resultado = $this->conexion->query($consulta);
    $asignaturas = [];
    while ($fila = $resultado->fetch_array()) {
        $asignaturas[] = $fila;
    }
    return $asignaturas;
}

function obtenerAsignatura($id) {
    $consulta = "SELECT * FROM asignatura WHERE id = " . $id;
    $resultado = $this->conexion->query($consulta);
    return $resultado->fetch_array();
}

function insertarAsignatura($nombre, $abreviatura) {
    $consulta = "INSERT INTO asignatura (nombre, abreviatura) 
                 VALUES ('$nombre', '$abreviatura')";
    return $this->conexion->query($consulta);
}

function actualizarAsignatura($id, $nombre, $abreviatura) {
    $consulta = "UPDATE asignatura 
                 SET nombre = '$nombre', abreviatura = '$abreviatura' 
                 WHERE id = " . $id;
    return $this->conexion->query($consulta);
}

function borrarAsignatura($id) {
    $consulta = "DELETE FROM asignatura WHERE id = " . $id;
    return $this->conexion->query($consulta);
}
}
?>
