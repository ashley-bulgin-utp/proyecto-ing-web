<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/log-reg.css">
    <link href='https://fonts.googleapis.com/css?family=Urbanist' rel='stylesheet'>
    <title>Registro</title>
</head>
<body>
    <section id="imgsec">
        <img src="<?php echo URLROOT; ?>/assets/Register/food2.jpg" width="100" height="749" id="food2">
    </section>
    <section id="logosec">
        <img src="<?php echo URLROOT; ?>/assets/Register/logo.png" width="300" height="60" id="logopic">
    </section>
    <section id="regsec">
        <aside style="align-items: center">
            <h1>Bienvenido</h1>
            <form style="margin-left: 30px;">
                <label for="regname">Nombre</label><br>
                <input type="text" id="regname" name="regname" class="input"><br>
                <label for="regapellido">Apellido</label><br>
                <input type="text" id="regapellido" name="regapellido" class="input"><br>
                <label for="regmail">Correo electrónico</label><br>
                <input type="email" id="regmail" name="regmail" class="input"><br>
                <label for="regphone">Teléfono</label><br>
                <input type="tel" id="regphone" name="regphone" class="input" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}"><br>
                <label for="regpass">Contraseña</label><br>
                <input type="password" id="regpass" name="regpass" class="input"><br>
                <p id="grey">¿Olvidó su contraseña?</p><br><br>

                <button>
                    <input type="submit" value="Registrar" id="button">
                </button>
            </form><br><br>
            <table>
                <tr>
                    <td id="gray">¿Ya tienes una cuenta?</td>
                    <td><a href="../../Login/login/1" id="green">Inicia sesión</a></td>
                </tr>
            </table>
        </aside>
    </section>
</body>
</html>