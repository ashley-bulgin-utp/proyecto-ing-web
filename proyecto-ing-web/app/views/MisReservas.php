<?php require APPROOT.'/views/includes/components/Menu.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/misResultados.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/ListadoRest/resultados.js" defer type="module"></script>
    <title>Mis Reservas</title>
</head>
<body>
    <main class="container-fluid   row">
        <div class="container-fluid pb-sm-5 p-0 px-sm-2 px-md-5">
          <h2 class="text-center pb-sm-2">Mis reservas</h2>
          <div id="results" class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-center justify-content-md-start">
            
         </div>
        </div>
    </main>
</body>
</html>
<?php require APPROOT.'/views/includes/components/Footer.php' ?>
