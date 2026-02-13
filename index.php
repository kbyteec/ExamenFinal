<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Alumnos</title>
        <link rel="stylesheet" href="public/vendor/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    </head>

    <body>
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            require_once "controllers/AlumnoController.php";
            require_once "controllers/NotaController.php";

            /* Controlador principal */
            $alumnoController = new AlumnoController();
            $notaController   = new NotaController();

            /* Acción recibida */
            $action = $_GET['action'] ?? 'listar';

            /* Router */
            switch ($action) {

                case 'crear':
                    $alumnoController->crear();
                    break;

                case 'editar':
                    $alumnoController->editar();
                    break;

                case 'eliminar':
                    $alumnoController->eliminar();
                    break;

                case 'agregarNota':
                    $notaController->crear();
                    break;

                case 'editarNota':
                    $notaController->editar();
                    break;

                case 'listar':
                default:
                    $alumnoController->listar();
                    break;
                
            }
        ?>

        <script src="public/vendor/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>

