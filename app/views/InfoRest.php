<?php require APPROOT.'/views/includes/components/Menu.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info restaurante</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/infoRest.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/35b83aded8.js" crossorigin="anonymous"></script>
    <script src="restaurante.js" defer type="module"></script>
</head>
<body>
    <div id="menu"></div>
    <main class="container-fluid">
        <a href="<?php echo URLROOT; ?>/ListadoRest/resultados?" class="btn d-none d-sm-inline-block" id="returnBtn"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
        <div id="infoRestaContainer" class="container-fluid">
            <div class="topRestaurante row container-fluid justify-content-center">
                <div class="topMain">
                    <?php $rest = $data["restauranteInfo"];?>
                    <h1 class="text-center" id="titulo"><?php echo $rest['nombre']; ?></h1>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active c-item">
                            <img src="<?php echo $rest['imagen1']?>" class="d-block  c-img" alt="restaurante-image">
                          </div>
                          <div class="carousel-item c-item">
                            <img src="<?php echo $rest['imagen2']?>" class="d-block  c-img" alt="restaurante-image">
                          </div>
                          <div class="carousel-item c-item">
                            <img src="<?php echo $rest['imagen3']?>" class="d-block  c-img" alt="restaurante-image">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
            <div class="contenido row container-fluid p-0 p-sm-5">
                <h2>Descripcion</h2>
                <p id="descripcion"><?php echo $rest['descripcion'];?></p>
                <h2>Ubicacion</h2>
                <p id="ubicacion">Provincia de <?php echo $rest['ubicacion'];?></p>
                <h2>Caracteristicas</h2>
                <ul>
                    <li>Tipo de local: <?php echo $rest['tipoRes'];?></li>
                    <li>Tipo de comida <?php echo $rest['tipoComida'];?> </li>
                    <li>Pecio Platillos: <?php echo $rest['precio']?></li>
                    <li>Calificacion de <?php echo $rest['resena'];?> estrellas</li>
                    <li>Horario: <?php echo $rest['horario'];?></li>
                    <li>Facilidades: <?php echo $rest['tipoFacilidad'];?></li>
                </ul>
                <h2>Contacto</h2>
                <ul>
                    <li>Correo: <?php echo $rest['correo'];?> </li>
                    <li>Telefono: <?php echo $rest['tel'];?></li>
                </ul>
                <div class="container-fluid d-flex justify-content-between">
                  <button class="btn btn-secondary shadow rounded" id="reservarBtn">Ver Menú</button>
                  <a href="../../HacerReserva/reservar/<?php echo $rest['id'] ?>">
                        <button class="btn btn-secondary shadow rounded" id="reservarBtn">Reservar</button>
                    </a>
                    
                </div>
            </div>
        </div>
    </main>
    <div id="footer"></div>

</body>
</html>
<?php require APPROOT.'/views/includes/components/Footer.php' ?>