<?php
require_once __DIR__ . '/../../models/Alumno.php';
require_once __DIR__ . '/../../models/Nota.php';

$alumnoModel = new Alumno();
$notaModel   = new Nota();

$alumnos = $alumnoModel->obtenerTodos();

/* Cabeceras para Excel */
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_notas.xls");
header("Pragma: no-cache");
header("Expires: 0");

/* Inicio tabla */
echo "Reporte General de Notas\n";
echo "Fecha: " . date('d/m/Y H:i') . "\n\n";

echo "Nombre\tApellido\tPromedio\tResultado\n";

foreach ($alumnos as $alumno) {

    $promedio  = $notaModel->calcularPromedio($alumno['id']);
    $resultado = $notaModel->resultadoCualitativo($promedio);

    echo $alumno['nombre'] . "\t";
    echo $alumno['apellido'] . "\t";
    echo $promedio . "\t";
    echo $resultado . "\n";
}
