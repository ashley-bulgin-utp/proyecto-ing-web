<html>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/log-reg.css">
    <link href='https://fonts.googleapis.com/css?family=Urbanist' rel='stylesheet'>
    <title>Iniciar sesión</title>
</head>
<body>
    <section id="imgsec">
        <img src="<?php echo URLROOT; ?>/assets/Login/food1.jpg"  width="100" height="649" id="food1">
    </section>
    <section id="logosec">
        <img src="<?php echo URLROOT; ?>/assets/Login/logo.png"  width="300" height="60" id="logopic">
    </section>
    <section id="loginsec">
        <aside>
            <h1>Bienvenido</h1>
            <form action="<?php echo URLROOT; ?>/Login/login/<?php echo $_SESSION['user_id']?>" method="POST">
                <label for="logmail">Correo electrónico</label><br>
                <input type="email" id="logmail" name="logmail" class="input" value="<?php echo $data['logmail'];?>" ><br>
                <p class="invalid" style="color: red"><?php echo $data['logmail_err'];?></p>

                <label for="logpass">Contraseña</label><br>
                <input type="password" id="logpass" name="logpass" class="input" value="<?php echo $data['logpass'];?>" >
                <p class="invalid" style="color: red"><?php echo $data['logpass_err'];?></p>

                <p id="grey">¿Olvidó su contraseña?</p><br><br>

                <button>
                    <input type="submit" value="Ingresar" id="button">
                </button>
            </form><br><br>
            <table>
                <tr>
                    <td id="gray">¿No tienes una cuenta?</td>
                    <td><a href="../../Register/register/1" id="green">Registrate</a></td>
                </tr>
            </table>
        </aside>
    </section>
</html> 