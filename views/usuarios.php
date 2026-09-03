<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<div class="container mt-4">
    <h2>Listado de Usuarios</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id_usuario'] ?></td>
                    <td><?= htmlspecialchars($usuario['nombre_usuario']) ?></td>
                    <td>
                        <!-- NUEVO: Verificar si hay sesión activa y si el ID coincide con el usuario logueado -->
                        <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id_usuario'] == $usuario['id_usuario']): ?>
                            $<?= number_format($usuario['saldo'], 2) ?>
                        <?php else: ?>
                            $***
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>