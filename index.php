<?php
include("connectToDb.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercado Libre Argentina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css"/>
    <link rel="icon" href="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/5.21.22/mercadolibre/favicon.svg">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="#">
              <img class="img-fluid col-8 offset-2" src="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/6.5.5/mercadolibre/logo__large_plus@2x.png">
            </a>
            <div class="navbar-collapse" id="navbarTogglerDemo03">
              <form class="d-flex col-10 offset-2" role="search">
                <input class="form-control me-2" type="search" placeholder="Busca productos, marcas y más..." aria-label="Search">
                <a href="#" class="btn active " role="button" data-bs-toggle="button" aria-pressed="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                  </svg>
                </a>
              </form>
            </div>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categorias
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Moda</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Más Vendidos</a></li>
                      <li><a class="dropdown-item" href="#">Juguetes</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./public/views/descripcion.html">Descripcion</a>
                  </li>
                </ul>

              </div>

              <?php
              session_start();
              if(isset($_SESSION['logged']) == false || $_SESSION['logged'] == false){
                echo '
                <a href="./login.php"> 
                <button type="submit" class="mlBtn">Ingresar</button>
                </a>
                ';
              }else{
                $currentRole = $_SESSION['role'];
                if($currentRole == "admin"){
                  echo '
                  <a href="./listProducts.php"> 
                  <button type="submit" class="mlBtn">Administrar productos</button>
                  </a>
                  ';
                }
                echo '
                <a href="./logout.php"> 
                <button type="submit" class="mlBtn">Cerrar Sesión</button>
                </a>
                ';
              }
              
              ?>
        </div>
    </nav>
    <!--Carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="hover">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://http2.mlstatic.com/D_NQ_987754-MLA77235225371_062024-OO.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://http2.mlstatic.com/D_NQ_680623-MLA77008842948_062024-OO.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://http2.mlstatic.com/D_NQ_987069-MLA76913296178_062024-OO.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--EndCarousel-->
    <!--Cards-->
    <section class="Productos">
        <h2 class="ProductosText">Productos</h2>
    </section>

    <div class="myCardGroup">

    <?php
        
        $query = "Select * from producto";
        $resultado = mysqli_query($con, $query);

        while($currentItem = mysqli_fetch_assoc($resultado)){
          echo '<div class="myCard">
                  <div class="myContent">
                    <a href="./public/views/producto.html">
                      <div class="myCardImgContainer">
                        <img class="myCardImg" src="' . $currentItem["imgurl"] . '" width="150px" height="150px" alt="...">
                      </div>
                      <h5>' . $currentItem["nombre"] .'</h5>
                      <p>$'. number_format($currentItem["precio"],2,'.') . '</p> 
                    </a>
                </div>
              </div>';
        }

        mysqli_close($con);
        ?>
        </div>
      </div>

    </div>

    <!--End Cards-->
      
      <footer>
        <p>Tomas Agustin Torres</p>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>