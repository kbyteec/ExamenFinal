<?php
require_once __DIR__ . '/../models/Nota.php';
require_once __DIR__ . '/../models/Alumno.php';

class NotaController {

    private $notaModel;
    private $alumnoModel;

    public function __construct() {
        $this->notaModel = new Nota();
        $this->alumnoModel = new Alumno();
    }

    public function crear() {

        $alumno_id = $_GET['alumno_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nota = $_POST['nota'];

            if ($nota >= 0 && $nota <= 10) {
                $this->notaModel->crear($alumno_id, $nota);
            }

            header("Location: index.php?action=listar");
            exit;
        }

        $alumno = $this->alumnoModel->obtenerPorId($alumno_id);
        require __DIR__ . '/../views/notas/crear.php';
    }

    public function editar() {

        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nota = $_POST['nota'];

            if ($nota >= 0 && $nota <= 10) {
                $this->notaModel->actualizar($id, $nota);
            }

            header("Location: index.php?action=listar");
            exit;
        }

        $notaData = $this->notaModel->obtenerPorId($id);
        require __DIR__ . '/../views/notas/editar.php';
    }
}
