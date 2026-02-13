<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-3">Editar Nota</h2>

<form method="POST" class="card p-4 shadow-sm">

    <div class="mb-3">
        <label class="form-label">Nota (0 - 10)</label>
        <input type="number"
               name="nota"
               class="form-control"
               value="<?= $nota['nota'] ?>"
               step="0.01"
               min="0"
               max="10"
               required>
    </div>

    <button type="submit" class="btn btn-warning">
        Actualizar Nota
    </button>

    <a href="index.php?action=listar" class="btn btn-secondary">
        Volver
    </a>

</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
