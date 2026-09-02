<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<div class="container mt-4">
    <h2>Retiro</h2>
    <?php if ($mensaje): ?>
        <div class="alert <?= strpos($mensaje, 'ERROR') !== false ? 'alert-danger' : 'alert-success' ?>">
            <?= $mensaje ?>
        </div>
    <?php endif; ?>
    <p>Saldo actual: $<?= number_format($saldoActual, 2) ?></p>
    <p>Nuevo saldo: $<?= number_format($nuevoSaldo, 2) ?></p>
</div>

<?php include 'views/partials/footer.php'; ?>