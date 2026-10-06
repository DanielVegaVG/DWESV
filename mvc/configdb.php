<?php
$conexion = new mysqli('127.0.0.1', 'root', '', 'daw');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
