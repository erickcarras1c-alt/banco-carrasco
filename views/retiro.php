<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<div class="container mt-4">
    <h2>Operaciones Bancarias</h2>

    <?php if ($mensaje): ?>
        <div class="alert <?= strpos($mensaje, 'ERROR') !== false ? 'alert-danger' : 'alert-success' ?>">
            <?= $mensaje ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['usuario'])): ?>
        <p><strong>Usuario:</strong> <?= htmlspecialchars($_SESSION['usuario']['nombre_usuario']) ?></p>
        <p><strong>Saldo disponible:</strong> $<?= number_format($saldoActual, 2) ?></p>

        <!-- NUEVO: Formulario con opciones de Depositar y Retirar -->
        <form action="index.php?accion=retiro" method="POST" class="mt-3" style="max-width: 350px;">
            <div class="mb-3">
                <label>Ingrese el monto:</label>
                <input type="number" step="0.01" min="1" name="monto" class="form-control" placeholder="Monto" required>
            </div>
            
            <!-- NUEVO: Dos botones con nombres diferentes para identificar la acción enviada -->
            <div class="d-flex gap-2">
                <button type="submit" name="operacion" value="depositar" class="btn btn-success">Depositar</button>
                <button type="submit" name="operacion" value="retirar" class="btn btn-warning">Retirar</button>
            </div>
        </form>
    <?php else: ?>
        <p class="mt-3">Por favor, <a href="index.php?accion=login">inicie sesión</a> para acceder a esta función.</p>
    <?php endif; ?>
</div>

<?php include 'views/partials/footer.php'; ?>