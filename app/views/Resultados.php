<?php require APPROOT.'/views/includes/components/Menu.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/listadoRest.css">
    <script src="https://kit.fontawesome.com/35b83aded8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/resultados.js" defer type="module"></script>
    
    <title>Resultados</title>
</head>
<body>
  <div id="seachContainer">
    <form class="d-flex justify-content-center">
        <input class="form-control me-2" type="search" placeholder="Buscar restaurantes" aria-label="buscar restaurantes">
        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
  </div>
    <main class="container-fluid   row">
        <aside class="col- col-sm-4 col-lg-2 container-fluid ">
          <button class="btn dropdown-toggle" id="filtroBtn" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#filtros">Filtros</button>
          <div id="filtros" class="collapse">
            <form action="" id="filtrosForm">
              <button class="btn" id="applyFilterBtn">Aplicar filtros</button>

              <fieldset class="shadow bg-white filtrosContainer">
                <legend>Tipo Comidas</legend>
                <div class="checkOption">
                  <input type="checkbox" name="comidas" id="asia" value="Asiatica"> 
                  <label for="china">Asiatica</label>
                </div>
                <div class="checkOption">
                  <input type="checkbox" name="comidas" id="panama" value="Panameña"> 
                  <label for="panama">Panameña</label>
                </div>
                <div class="checkOption">
                  <input type="checkbox" name="comidas" id="mexico" value="Mexicana"> 
                  <label for="mexicana">Mexicana</label>
                </div>
              </fieldset>

              <fieldset class="shadow bg-white filtrosContainer">
                <legend>Costo</legend>
                <div class="checkOption">
                    <input type="checkbox" name="costo" id="caro" value="Caro"> 
                    <label for="caro">Caro</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="costo" id="regular" value="Regular"> 
                    <label for="regular">Regular</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="costo" id="barato" value="Barato"> 
                    <label for="barato">Barato</label>
                </div>
              </fieldset>

              <fieldset class="shadow bg-white filtrosContainer">
                <legend>Ubicación</legend>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="bocasDelToro" value="Bocas del toro"> 
                    <label for="bocasDelToro">Bocas del toro</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="cocle" value="Coclé"> 
                    <label for="cocle">Coclé</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="colon" value="Colón"> 
                    <label for="colon">Colón</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="chiriqui" value="Chiriquí"> 
                    <label for="chiriqui">Chiriquí</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="darien" value="Darién"> 
                    <label for="darien">Darién</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="herrera" value="Herrera"> 
                    <label for="herrera">Herrera</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="losSantos" value="Los Santos"> 
                    <label for="losSantos">Los Santos</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="panama" value="Panamá"> 
                    <label for="panama">Panamá</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="panamaOeste" value="Panama Oeste"> 
                    <label for="panamaOeste">Panama Oeste</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="provincias" id="veraguas" value="Veraguas"> 
                    <label for="veraguas">Veraguas</label>
                </div>
              </fieldset>

              <fieldset class="shadow bg-white filtrosContainer">
                <legend>Reseñas</legend>
                <div class="checkOption">
                    <input type="checkbox" name="reseñas" id="5estrellas" value="5"> 
                    <label for="5estrellas">5 estrellas</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="reseñas" id="4estrellas" value="4"> 
                    <label for="4estrellas">4 estrellas</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="reseñas" id="3estrellas" value="3"> 
                    <label for="3estrellas">3 estrellas</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="reseñas" id="2estrellas" value="2"> 
                    <label for="2estrellas">2 estrellas</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="reseñas" id="1estrellas" value="1"> 
                    <label for="1estrellas">1 estrellas</label>
                </div>
              </fieldset>

              <fieldset class="shadow bg-white filtrosContainer">
                <legend>Tipo restaurante</legend>
                <div class="checkOption">
                    <input type="checkbox" name="tipoRes" id="restaurante" value="Restaurante"> 
                    <label for="restaurante">Restaurante</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="tipoRes" id="fonda" value="Fonda"> 
                    <label for="fonda">Fonda</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="tipoRes" id="cafeteria" value="Cafeteria"> 
                    <label for="cafeteria">Cafeteria</label>
                </div>
              </fieldset>

              <fieldset class="shadow bg-white filtrosContainer">
                <legend>Facilidades</legend>
                <div class="checkOption">
                    <input type="checkbox" name="facilidades" id="sillaBebe" value="silla Bebe"> 
                    <label for="sillaBebe">Silla bebe</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="facilidades" id="cambiador" value="cambiador"> 
                    <label for="cambiador">Cambiador</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="facilidades" id="menuInfante" value="menu de niños"> 
                    <label for="menuInfante">Menu de niños</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="facilidades" id="accesibilidad" value="Accesible para discapacitados"> 
                    <label for="accesibilidad">Accesible para discapacitados</label>
                </div>
                <div class="checkOption">
                    <input type="checkbox" name="facilidades" id="parking" value="parking"> 
                    <label for="parking">Parking</label>
                </div>
              </fieldset>

            </form>
          </div>
        </aside>


        <div class="container-fluid col">
          <h2>Restaurantes encontrados</h2>
          <div id="results" class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-center justify-content-md-start">
                <?php if (count($data["restaurantes"]) < 1): ?>
                    <div style="height:50vh">
                        <p>No se encontraron restaurantes.</p>
                    </div>
                <?php else: ?>
                <?php foreach ($data["restaurantes"] as $rest): ?>
                        <div class="card col shadow rounded restauranteCard">
                            <img src="<?php echo $rest['imagen1']; ?>" alt="Restaurante <?php echo $rest['nombre']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rest['nombre']; ?></h5>
                                <p class="card-text precio"><?php echo $rest['precio']; ?></p>
                                <p class="card-text horario"><?php echo $rest['horario']; ?></p>
                                <p class="card-text ubicacion"><?php echo $rest['ubicacion']; ?></p>
                                <div class="expandContainer">
                                    <a href="<?php echo URLROOT; ?>/InfoRest/info/?restId=<?php echo $rest['id']; ?>" class="btn expandBtn justify-content-end">Ver más</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>
<?php require APPROOT.'/views/includes/components/Footer.php' ?>