<?php include 'vista/partials/header.php'; ?>
<?php include 'vista/partials/nav.php'; ?>

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
</div>

<?php include 'vista/partials/footer.php'; ?>