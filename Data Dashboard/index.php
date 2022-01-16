<!doctype html>
<html lang="es">
  <head>
    <!--  This favicon is an animation. 
          Only the Firefox browser supports animated favicons yet. 
          For that reason I need to generate an additional non-animated favicon.ico file. 
    -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  <!--  This favicon is STATIC -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">           <!--  This favicon is ANIMATED -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Include the JavaScript files    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- jQuery CDN -->
    <script src="https://code.highcharts.com/highcharts.js"></script>                         <!-- HighCharts CDN -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>AA.DD.I.II.U. - Distributed Data Dashboard</title>
  </head>

  <body>

    <!-- Navigation Bar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <!-- Imagen de Black Flag en la parte superior izquierda del Navigation Bar -->
            <img src="images/black_flag_logo-768x768.png" alt="Logo de la retorno a la página principal" 
            width="30" height="24" class="d-inline-block align-text-top">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Enlace 1 (Home). Retorno a la página principal -->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <!-- Enlace 2 (UIB). Página principal de la UIB-->
                <li class="nav-item">
                  <a class="nav-link" href="https://www.uib.cat" target="_blank">UIB</a>
                </li>

                <!--  Enlace 3. Página de la 1ª práctica que hice de ADIIU (PUNK ROCK BLOG). 
                      Colgada en w3spaces.com-->
                <li class="nav-item">
                  <a class="nav-link" href="https://andreuet.w3spaces.com/" target="_blank">Práctica 1 ADIIU</a>
                </li>
              </ul>
        </div>
      </div>
    </nav>
    <div class="container">

      <div class="row">

        <!--                Grid 1,1 (superior izquierda). Gráfica Top 10 géneros -->
        <div class="col">
          <div id="container1" style="width: 100%; height: 330px;"></div>
        </div>

        <!--                Grid 1,2 (superior derecha). Gráfica % ventas por tipo de soporte -->
        <div class="col">
          <div id="container2" style="width: 100%; height: 330px;"></div>
        </div>
      </div>

      <div class="row">

        <!--                Grid 2,1 (inferior izquierda). Gráfica total ventas por tipo de soporte -->
        <div class="col">
          <div id="container3" style="width: 100%; height: 330px;"></div>
        </div>

        <!--                Grid 2,2 (inferior derecha). Gráfica ventas totales en cada país -->
        <div class="col">
         <div id="container4" style="width: 100%; height: 330px;"></div>
        </div>

      </div>
    </div>


    <!-- Mi único JavaScript (del lado del cliente) -->
    <script type="text/javascript" src="./js/client.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
