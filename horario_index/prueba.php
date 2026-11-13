<?php
require_once './controlador/'.$_GET["controlador"].".php";
$metodo = $_GET['metodo'];
$controlador = new $_GET['controlador']();
$asignatura = $controlador->$metodo();
include $controlador->vista;
?>