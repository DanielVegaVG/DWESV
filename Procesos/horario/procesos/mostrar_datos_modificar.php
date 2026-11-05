<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$id = $_GET['id'];
$asignatura = $controlador->mostrarParaModificar($conexion, $id);
require "../vista/v-form_asignatura.php";
?>