<?php require APPROOT.'/views/includes/components/Menu.php' ?>
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
                    <img src="<?php echo URLROOT; ?>/assets/AjusteUsuario/placeholderProfile.png" alt="Foto de perfil">
                </div>
                <div class="upload">
                    <form action="" class="ajustarPerfil">
                        <label for="imageUpload">Subir Archivo | <i class="fa-solid fa-cloud-arrow-up"></i></label>
                        <input type="file" id="imageUpload" name="image" accept=".jpeg, .jpg, .png" onchange="checkFile(this)" required>
                        <p>Archivos aceptados: (.jpeg, .jpg, .png, max 5MB)</p>
                        <p id="fileSizeError" style="color: red; display: none;">File size exceeds the limit (5MB).</p>
                    </form>
                </div>
        </div>
        <div id="ajustarInfo">
            <h1>Ajustes de Perfil</h1>
            <form action="">
                <div class="field-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" required>
                </div>
                <div class="field-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" required>
                </div>
                <div class="field-group">
                    <label for="telephone">Teléfono</label>
                    <input type="tel" pattern="[0-9]" id="telephone" required>
                </div>
                <div class="field-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" required>
                </div>
                <div class="botones">
                    <button type="submit" class="btn-cancelar">Cancelar</button>
                    <button type="submit" class="btn-guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php require APPROOT.'/views/includes/components/Footer.php' ?>