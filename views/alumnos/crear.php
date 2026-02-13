<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-3 text-center">Crear Alumno</h2>

<form method="POST" class="card p-4 shadow-sm">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success col-md-3 col-sm-12 mt-2">Guardar</button>
    <a href="index.php?action=listar" class="btn btn-secondary col-md-3 col-sm-12 mt-2">Volver</a>

</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
