<?php require APPROOT.'/views/includes/components/Menu.php'; 
    $profileData = $data['data']['profileData'];
    $userData = $data['data']['userData'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes de Perfil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/ajusteUsuario.css">
    <!-- Menu CSS -->
    <link rel="stylesheet" href="/client/components/Menu/Menu.css">
    <!-- Footer CSS -->
    <link rel="stylesheet" href="/client/components/Footer/Footer.css">
</head>
<body>
    <div id="main-content">
        <h1 class="mobileh1">Ajustes de Perfil</h1>
        <div id="ajustar-perfil">
                <div class="perfil">
                    <?php
                        if (isset($_SESSION['user_image'])) {
                            echo "<img class='profile_img' src='{$_SESSION['user_image']}' alt='Foto de perfil'>";
                        } else {
                            echo "<img class='profile_img' src='../../assets/Menu/blank-profile.png' alt='Foto de perfil'>";
                        }
                    ?>
                </div>
                <div class="upload">
                    <form action="<?php echo URLROOT; ?>/AjusteUsuario/ajuste<?php echo $_SESSION['user_id'] ?>" class="ajustarPerfil" method="POST" enctype="multipart/form-data">
                        <label for="imageUpload">Subir Archivo | <i class="fa-solid fa-cloud-arrow-up"></i></label>
                        <input type="file" id="imageUpload" name="image" accept=".jpeg, .jpg, .png" value="<?php echo $profileData['image'] ?>" required>
                        <p style="color: red;"><?php echo $profileData['image_err'] ?></p>
                        <p>Archivos aceptados: (.jpeg, .jpg, .png, max 5MB)</p>
                        <p id="fileSizeError" style="color: red; display: none;">File size exceeds the limit (5MB).</p>
                    </form>
                </div>
        </div>
        <div id="ajustarInfo">
            <h1>Ajustes de Perfil</h1>
            <form action="<?php echo URLROOT; ?>/AjusteUsuario/ajuste/<?php echo $_SESSION['user_id'] ?>" method="POST">
                <div class="field-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" value="<?php echo $userData['usu_nombre'] ?>">
                    <p style="color: red;"><?php echo ($userData['usu_nombre_err']) ?></p>
                </div>
                <div class="field-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $userData['usu_apellido'] ?>">
                    <p style="color: red;"><?php echo ($userData['usu_apellido_err']) ?></p>
                </div>
                <div class="field-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" value="<?php echo $userData['usu_contrasena'] ?>">
                    <p style="color: red;"><?php echo ($data['data']['userData']['usu_contrasena_err']) ?></p>
                </div>
                <div class="field-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="<?php echo $userData['usu_correo'] ?>">
                    <p style="color: red;"><?php echo ($userData['usu_correo_err']) ?></p>
                </div>
                <div class="field-group">
                    <label for="telephone">Teléfono</label>
                    <input type="tel" id="telephone" name="telephone" value="<?php echo $userData['usu_telefono'] ?>"> 
                    <p style="color: red;"><?php echo ($userData['usu_telefono_err']) ?></p>
                    <p style="color: red;"><?php echo ($data['err_msg']) ?></p>
                    <p style="color: green;"><?php echo ($data['success_msg']) ?></p>

                </div>
                <div class="botones">
                    <button type="submit" class="btn-cancelar" onclick="this.form.reset();">Cancelar</button>
                    <button type="submit" class="btn-guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php require APPROOT.'/views/includes/components/Footer.php' ?>