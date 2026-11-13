<?php
require_once "../controlador/c_asignatura.php";

$controlador = new c_asignatura();
$asignatura = $controlador->borrar();
include $controlador->vista;
?>