<h3>Fetch de Todos los Usuarios</h3>
<?php foreach ($data['users'] as $user): ?>
    <p>Hello <?php echo $user['usu_nombre'] ?></p>
<?php endforeach; ?>