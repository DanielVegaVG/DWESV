<?php
require './modelo/asignaturas.php';
class c_asignatura {
    public $vista;
    public function listar() {
        $asignatura= new asignaturas;
        $this->vista = "./vista/v-listar_asignaturas.php";
        return $asignatura->obtenerAsignaturas();
    }
    public function pedirDatos() {
        $this->vista = "../vista/v-form_asignatura.html";
        return null;
    }
    public function guardar() {
        $asignatura= new asignaturas;
        $nombre = $_POST['nombre'];
        $abreviatura = $_POST['abreviatura'];
        $id = $_POST['id'] ?? null;
        if($id !== null) {
            $asignatura->actualizarAsignatura($id, $nombre, $abreviatura);
        } else{
            $asignatura->insertarAsignatura($nombre, $abreviatura);
        }
        header('Location: listar_asignaturas.php?controlador=c_asignatura&metodo=listar');
    }

    public function borrar() {
        $asignatura= new asignaturas;
        $id = $_GET['id']; 
        $asignatura->borrarAsignatura($id);
        header('Location: listar_asignaturas.php?controlador=c_asignatura&metodo=listar');
    }

    public function modificar() {
        $asignatura= new asignaturas;
        $id = $_GET['id'];
        $this->vista = "../vista/v-form_modasignatura.php";
        return $asignatura->obtenerAsignatura($id);
    }
}
?>