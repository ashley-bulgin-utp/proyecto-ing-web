<?php require APPROOT . '/views/includes/components/Menu.php';
$restData = $data['restData'];
$reservaData = $data['reservaData'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/hacerReserva.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
</head>

<body>
    <div id="mainContent">
        <div class="upper">
            <a href="<?php echo URLROOT; ?>/InfoRest/info/?restId=<?php echo $restData['id'] ?>"><i class="fa-solid fa-arrow-left left-arrow"></i></a>
            <h1><?php echo $restData['nombre'] ?></h1>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="<?php echo $restData['imagen1'] ?>" class="d-block  c-img" alt="imagen-restaurante">
                </div>
                <div class="carousel-item c-item">
                    <img src="<?php echo $restData['imagen2'] ?>" class="d-block  c-img" alt="imagen-restaurante">
                </div>
                <div class="carousel-item c-item">
                    <img src="<?php echo $restData['imagen3'] ?>" class="d-block  c-img" alt="imagen-restaurante">
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
        <div id="reservaForm">
            <form id="reservar" action="<?php echo URLROOT; ?>/HacerReserva/reservar/<?php echo $restData['id'] ?>" method="POST">
                <!-- Fecha -->
                <div class="field-group">
                    <label for="dateInput" class="sr-only">Fecha</label>
                    <input type="date" name="dia" id="dateInput" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $reservaData['dia'] ?>" required>
                </div>
                <!-- Sillas de bebe -->
                <div class="field-group">
                    <label for="sillas-dd" class="sr-only">Fecha</label>
                    <select id='sillas-dd' name='sillasBebe' required>
                        <option value='0' selected="selected">No requerido</option>
                        <option value='1'>1 silla bebe</option>
                        <option value='2'>2 sillas bebe</option>
                        <option value='3'>3 sillas bebe</option>
                    </select>
                </div>
                <!-- Hora -->
                <div class="field-group">
                    <label for="time" class="sr-only">Hora</label>
                    <input type="time" name="time" id="time" value="<?php echo $reservaData['hora'] ?>" required>
                </div>
                <!-- Comentario -->
                <div class="field-group-textarea">
                    <label for="comentario">Comentarios adicionales</label>
                    <textarea name="comentario" id="comentario"></textarea>
                </div>
                <div class="field-group">
                    <label for="personas-dd" class="sr-only">Personas</label>
                    <select id='personas-dd' name='personas' required>
                        <option value='1' selected="selected">1 persona</option>
                        <option value='2'>2 personas</option>
                        <option value='3'>3 personas</option>
                        <option value='3'>4+ personas</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="botones">
            <?php
                if (!empty($data['response'])) {
                    echo "<button class='btn btn-primary btn-cancelar' onclick='this.form.reset()' disabled >Cancelar</button>";
                } else {
                    echo "<button class='btn btn-primary btn-cancelar' onclick='this.form.reset()' >Cancelar</button>";
                }
                
                if (empty($data['response'])) {
                    echo "<p style='color: red;'>";
                    echo ($data['error']);
                    echo "</p>";
                } elseif (empty($data['error'])) {
                    echo "<p style='color: green;'>";
                    echo ($data['response']);
                    echo "</p>";
                }
                
                if (!empty($data['response'])) {
                    echo "<button type='submit' form='reservar' class='btn btn-primary btn-reservar' disabled>Reservar</button>";
                } else {
                    echo "<button type='submit' form='reservar' class='btn btn-primary btn-reservar'>Reservar</button>";
                }
            ?>
        </div>

    </div>
</body>

</html>
<?php require APPROOT . '/views/includes/components/Footer.php' ?>