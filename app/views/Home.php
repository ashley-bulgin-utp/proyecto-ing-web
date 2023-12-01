<?php require APPROOT.'/views/includes/components/Menu.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/35b83aded8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">

</head>
<body>
    <div id="seachContainer">
        <form class="d-flex justify-content-center" <?php echo $_SERVER['PHP_SELF'] ?>>
            <input class="form-control me-2" type="search" placeholder="Buscar restaurantes" aria-label="buscar restaurantes">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
      </div>
    <main>
        <h2>Los mejores restaurantes</h2>
        <div class="topRestaurante row container-fluid justify-content-center">
            <div class="topMain">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active c-item">
                        <img src="<?php echo URLROOT; ?>/assets/Home/1.jpeg" class="d-block  c-img" alt="restaurante-image">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Azahar</h5>
                        </div>
                      </div>
                      <div class="carousel-item c-item">
                        <img src="<?php echo URLROOT; ?>/assets/Home/2.jpeg" class="d-block  c-img" alt="restaurante-image">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Fonda Lo Que Hay</h5>
                        </div>
                      </div>
                      <div class="carousel-item c-item">
                        <img src="<?php echo URLROOT; ?>/assets/Home/3.jpeg" class="d-block  c-img" alt="restaurante-image">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Los Rancheros</h5>
                        </div>
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
    </main>

<?php require APPROOT.'/views/includes/components/Footer.php' ?>

