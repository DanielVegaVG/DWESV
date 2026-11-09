<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$id = $_GET['id'];
$asignatura = $controlador->borrar($conexion, $id);

if (is_array($asignatura)) {
    include $controlador->vista;
}
?>