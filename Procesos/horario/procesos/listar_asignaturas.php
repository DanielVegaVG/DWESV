<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$asignaturas = $controlador->listar($conexion);
require "../vista/v-listar_asignaturas.php";
?>