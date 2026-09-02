<?ph<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<div class="container mt-4">
    <h2>Login</h2>
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>

    <?php if ($usuarioLogueado): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bienvenido, <?= htmlspecialchars($usuarioLogueado['nombre_usuario']) ?></h5>
                <p class="card-text">Saldo actual: $<?= number_format($usuarioLogueado['saldo'], 2) ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- NUEVO: Formulario sencillo de inicio de sesión -->
    <form action="index.php?accion=login" method="POST" class="mt-3">
        <div class="mb-2">
            <label>Usuario:</label>
            <input type="text" name="u" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Contraseña:</label>
            <input type="password" name="p" class="form-control" required>
        </div>
        <!-- NUEVO: Botón para enviar las credenciales -->
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>

<?php include 'views/partials/footer.php'; ?>