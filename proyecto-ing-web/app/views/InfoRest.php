<?php require APPROOT.'/views/includes/components/Menu.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info restaurante</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/infoRest.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/35b83aded8.js" crossorigin="anonymous"></script>
    <script src="restaurante.js" defer type="module"></script>
</head>
<body>
    <div id="menu"></div>
    <main class="container-fluid">
        <a href="../ListadoRest/resultados.html" class="btn d-none d-sm-inline-block" id="returnBtn"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
        <div id="infoRestaContainer" class="container-fluid">
            <div class="topRestaurante row container-fluid justify-content-center">
                <div class="topMain">
                    <h1 class="text-center" id="titulo">Nombre del restaurante</h1>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active c-item">
                            <img src="<?php echo URLROOT; ?>/assets/InfoRest/1.png" class="d-block  c-img" alt="restaurante-image">
                          </div>
                          <div class="carousel-item c-item">
                            <img src="<?php echo URLROOT; ?>/assets/InfoRest/2.png" class="d-block  c-img" alt="restaurante-image">
                          </div>
                          <div class="carousel-item c-item">
                            <img src="<?php echo URLROOT; ?>/assets/InfoRest/3.png" class="d-block  c-img" alt="restaurante-image">
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
                
                <!-- <div style="width: 300px; height: 200px; background-color: gray;">
                </div> -->
                

            </div>
            <div class="contenido row container-fluid p-0 p-sm-5">
                <h2>Descripcion</h2>
                <p id="descripcion">Lorem ipsum dolor sit amet.</p>
                <h2>Ubicacion</h2>
                <p id="ubicacion">Lorem ipsum dolor sit amet.</p>
                <h2>Caracteristicas</h2>
                <p id="caracteristicas">Lorem ipsum dolor sit amet.</p>
                <h2>Contacto</h2>
                <p id="contacto">Lorem ipsum dolor sit amet.</p>
                <div class="container-fluid d-flex justify-content-end">
                    <a href="/client/VHMReserva/HacerReserva.html">
                        <button class="btn btn-secondary shadow rounded" id="reservarBtn">Reservar</button>
                    </a>
                    
                </div>
            </div>
        </div>
    </main>
    <div id="footer"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){
            $("#menu").load("/client/components/Menu/Menu.html");
        });
        $(function(){
            $("#footer").load("/client/components/Footer/Footer.html");
        });

        function checkFile(input) {
            const file = input.files[0];
            const maxSize = 5 * 1024 * 1024; // 5MB in bytes

            if (file) {
                if (file.size > maxSize) {
                    document.getElementById('fileSizeError').style.display = 'block';
                    input.value = ''; // Clear the input field
                } else {
                    document.getElementById('fileSizeError').style.display = 'none';
                }
              }
        }
    </script>
</body>
</html>
<?php require APPROOT.'/views/includes/components/Footer.php' ?>