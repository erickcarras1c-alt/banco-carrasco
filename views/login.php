<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<div class="container mt-4">
    <h2>Login</h2>
    
    <!-- Muestra mensaje solo cuando haya alguna notificación -->
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>

    <!-- Si está logueado muestra sus datos y el botón de Cerrar Sesión -->
    <?php if ($usuarioLogueado): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bienvenido, <?= htmlspecialchars($usuarioLogueado['nombre_usuario']) ?></h5>
                <p class="card-text">Saldo actual: $<?= number_format($usuarioLogueado['saldo'], 2) ?></p>
                
                <!-- NUEVO: Botón para salir/cerrar sesión -->
                <a href="index.php?accion=logout" class="btn btn-danger mt-2">Cerrar Sesión</a>
            </div>
        </div>
    <?php else: ?>
        <!-- Formulario para ingresar credenciales -->
        <form action="index.php?accion=login" method="POST" class="mt-3">
            <div class="mb-2">
                <label>Usuario:</label>
                <input type="text" name="u" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Contraseña:</label>
                <input type="password" name="p" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    <?php endif; ?>
</div>

<?php include 'views/partials/footer.php'; ?>