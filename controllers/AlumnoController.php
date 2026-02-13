<?php
require_once __DIR__ . '/../models/Alumno.php';
require_once __DIR__ . '/../models/Nota.php';


class AlumnoController {

    private $model;

    public function __construct() {
        $this->model = new Alumno();
    }

    public function listar() {
        $alumnos = $this->model->obtenerTodos();
        $notaModel = new Nota();

        foreach ($alumnos as &$alumno) {
            $promedio = $notaModel->calcularPromedio($alumno['id']);
            $alumno['promedio'] = $promedio;
            $alumno['resultado'] = $notaModel->resultadoCualitativo($promedio);
        }

        require __DIR__ . '/../views/alumnos/listar.php';
    }

    public function crear() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];

            $this->model->crear($nombre, $apellido, $correo);

            header("Location: index.php?action=listar");
            exit;
        }

        require __DIR__ . '/../views/alumnos/crear.php';
    }

    public function editar() {

        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];

            $this->model->actualizar($id, $nombre, $apellido, $correo);

            header("Location: index.php?action=listar");
            exit;
        }

        $alumno = $this->model->obtenerPorId($id);
        require __DIR__ . '/../views/alumnos/editar.php';
    }

    public function eliminar() {

        $id = $_GET['id'];
        $this->model->eliminar($id);

        header("Location: index.php?action=listar");
        exit;
    }
}
