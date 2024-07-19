<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="./index.php">
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