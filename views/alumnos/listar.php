<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-3 text-center">Lista de Alumnos</h2>

<a href="index.php?action=crear" class="btn btn-primary mb-3">
    Nuevo Alumno
</a>

<a href="reports/pdf/reporte_notas.php"
    target="_blank"
    class="btn btn-danger mb-3">
    Generar PDF
</a>

<a href="reports/excel/reporte_notas.php"
   class="btn btn-success mb-3">
   Exportar Excel
</a>


<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Promedio</th>
            <th>Resultado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumnos as $alumno): ?>
            
            <tr>
                <td><?= $alumno['id'] ?></td>
                <td><?= $alumno['nombre'] ?></td>
                <td><?= $alumno['apellido'] ?></td>
                <td><?= $alumno['correo'] ?></td>
                <td><?= $alumno['promedio'] ?></td>
                
                <td>
                    <?php
                        $class = match($alumno['resultado']) {
                            'Suspenso' => 'text-danger fw-bold',
                            'Bien' => 'text-primary fw-bold',
                            'Notable' => 'text-success fw-bold',
                            'Sobresaliente' => 'text-warning fw-bold',
                        };
                    ?>
                    <span class="<?= $class ?>">
                        <?= $alumno['resultado'] ?>
                    </span>
                </td>

                <td>
                    <a href="index.php?action=agregarNota&alumno_id=<?= $alumno['id'] ?>"
                        class="btn btn-sm btn-info col-sm-12 mb-2">
                        Agregar Nota
                    </a>
    
                    <a href="index.php?action=editar&id=<?= $alumno['id'] ?>"
                        class="btn btn-sm btn-warning col-sm-12 mb-2"> 
                        Editar
                    </a>

                    <a href="index.php?action=eliminar&id=<?= $alumno['id'] ?>"
                        class="btn btn-sm btn-danger col-sm-12  mb-2"
                        onclick="return confirm('¿Seguro que deseas eliminar este alumno?')">
                        Eliminar
                    </a>

                   

                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>