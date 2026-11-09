<?php
require "../configdb.php";
require "../modelo/asignaturas.php";
require "../controlador/c-asignatura.php";

$controlador = new ControladorAsignatura();
$asignatura = $controlador->pedirDatos();
include $controlador->vista;
?>