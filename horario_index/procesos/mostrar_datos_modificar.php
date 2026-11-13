<?php
require_once "../controlador/c_asignatura.php";

$controlador = new c_asignatura();
$asignatura = $controlador->mostrarParaModificar();
include $controlador->vista;
?>