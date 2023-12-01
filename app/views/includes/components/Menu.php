<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/menu.css">
</head>
<body>
    <section id="upper">
        <div class="logo">
            <img src="<?php echo URLROOT; ?>/assets/Menu/logo-rojo.png" alt="logo">
        </div>
        <div class="user_profile">
            <!-- <i class="fa-regular fa-user"></i> -->
            <?php
                if (isset($_SESSION['user_image'])) {
                    echo "<img class='user_profile_img' src='{$_SESSION['user_image']}' alt='user'>";
                } else {
                    echo "<img class='user_profile_img' src='../../assets/Menu/blank-profile.png' alt='user'>";
                }
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo ($_SESSION['user_name']) ?> 
            </a>
            <!-- Dropdown Menu -->
            <ul class="dropdown-menu nav-item dropdown" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../../AjusteUsuario/ajuste/<?php echo $_SESSION['user_id'] ?>">Ajustar Perfil</a></li>
                <li><a class="dropdown-item" href="../../Login/login/1 <?php
                require ('login.php');
                logout($user);
                ?>">Cerrar Sesión</a></li>
            </ul>
        </div>
    </section>
    <section id="lower">
        <ul class="menu-list">
            <li><a href="../../Home/home/1">Home</a></li>
            <li><a href="../../ListadoRest/resultados/1">Lista de Restaurantes</a></li>
            <li><a href="../../MisReservas/misReservas/<?php echo $_SESSION['user_id'] ?>">Mis Reservas</a></li>
            <li><a href="../../AcercadePag/about/1">Acerca de la Página</a></li>
        </ul>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
</head>
<body>
  
