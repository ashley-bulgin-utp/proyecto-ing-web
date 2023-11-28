<?php require APPROOT . '/views/includes/components/Menu.php' ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/misResultados.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/listadoRest.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mis Reservas</title>
</head>

<body>
    <main class="container-fluid row">
        <div class="container-fluid pb-sm-5 p-0 px-sm-2 px-md-5">
            <h2 class="text-center pb-sm-2">Mis reservas</h2>
            <div id="results" class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-center justify-content-md-start">
                <?php if(!empty($data)) :?>
                    <?php foreach($data as $reserva) : ?>    
                        <div class="card col shadow rounded restauranteCard">
                            <img src=<?php echo $reserva['imagen']; ?> alt="Restaurante <?php echo $reserva['nombre_rest']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $reserva['nombre_rest'] ?></h5>
                                <p class="card-text date"><?php echo $reserva['dia'] ?></p>
                                <p class="card-text horario"><?php echo $reserva['hora'] ?></p>
                                <p class="card-text ubicacion"><?php echo $reserva['ubicacion'] ?></p>
                                <div class="expandContainer">
                                    <a href="<?php echo URLROOT; ?>/VerReserva/ver/<?php echo $reserva['id']; ?>" class="btn expandBtn justify-content-end">Ver más</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tiene reservas registradas.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

</html>
<?php require APPROOT . '/views/includes/components/Footer.php' ?>