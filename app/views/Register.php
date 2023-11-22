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
            <form style="margin-left: 30px;" action="<?php echo URLROOT; ?>/Register/register/1" method="POST">
                <label for="regname">Nombre</label><br>
                <input type="text" id="regname" name="regname" class="input" value="<?php echo $data['regname']; ?>" ><br>
                <p class="invalid" style="color: red"><?php echo $data['regname_err'];?></p>

                <label for="regapellido">Apellido</label><br>
                <input type="text" id="regapellido" name="regapellido" class="input" value="<?php echo $data['regapellido']; ?>" ><br>
                <p class="invalid" style="color: red"><?php echo $data['regapellido_err'];?></p>

                <label for="regmail">Correo electrónico</label><br>
                <input type="email" id="regmail" name="regmail" class="input" value="<?php echo $data['regmail']; ?>" ><br>
                <p class="invalid" style="color: red"><?php echo $data['regmail_err'];?></p>

                <label for="regphone">Teléfono</label><br>
                <input type="tel" id="regphone" name="regphone" class="input" value="<?php echo $data['regphone']; ?>" ><br>
                <p class="invalid" style="color: red"><?php echo $data['regphone_err'];?></p>

                <label for="regpass">Contraseña</label><br>
                <input type="password" id="regpass" name="regpass" class="input" value="<?php echo $data['regpass']; ?>" ><br>
                <p class="invalid" style="color: red"><?php echo $data['regpass_err'];?></p>

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
