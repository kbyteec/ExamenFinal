<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-3">Agregar Nota</h2>

<div class="card p-4 shadow-sm">

    <p><strong>Alumno:</strong>
        <?= $alumno['nombre'] . " " . $alumno['apellido'] ?>
    </p>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nota (0 - 10)</label>
            <input type="number" name="nota"
                   class="form-control"
                   step="0.01"
                   min="0"
                   max="10"
                   required>
        </div>

        <button type="submit" class="btn btn-success">
            Guardar Nota
        </button>

        <a href="index.php?action=listar" class="btn btn-secondary">
            Volver
        </a>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
