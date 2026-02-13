<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../public/vendor/fpdf186/fpdf.php';
require_once __DIR__ . '/../../models/Alumno.php';
require_once __DIR__ . '/../../models/Nota.php';

$alumnoModel = new Alumno();
$notaModel   = new Nota();

$alumnos = $alumnoModel->obtenerTodos();

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reporte General de Notas',0,1,'C');
$pdf->Ln(3);

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,8,'Fecha: '.date('d/m/Y H:i'),0,1,'R');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,8,'Nombre',1);
$pdf->Cell(40,8,'Apellido',1);
$pdf->Cell(30,8,'Promedio',1);
$pdf->Cell(40,8,'Resultado',1);
$pdf->Ln();

$pdf->SetFont('Arial','',10);

foreach ($alumnos as $alumno) {

    $promedio  = $notaModel->calcularPromedio($alumno['id']);
    $resultado = $notaModel->resultadoCualitativo($promedio);

    $pdf->Cell(40,8,$alumno['nombre'],1);
    $pdf->Cell(40,8,$alumno['apellido'],1);
    $pdf->Cell(30,8,$promedio,1);
    $pdf->Cell(40,8,$resultado,1);
    $pdf->Ln();
}

$pdf->Ln(5);
$pdf->Cell(0,8,'Total de alumnos: '.count($alumnos),0,1,'L');

$pdf->Output();
