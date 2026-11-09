<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$asignaturas = $controlador->listar($conexion);
include $controlador->vista;
?>