<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-3">Editar Alumno</h2>

<form method="POST" class="card p-4 shadow-sm">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control"
               value="<?= $alumno['nombre'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control"
               value="<?= $alumno['apellido'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control"
               value="<?= $alumno['correo'] ?>" required>
    </div>

    <button type="submit" class="btn btn-warning">Actualizar</button>
    <a href="index.php?action=listar" class="btn btn-secondary">Volver</a>

</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
