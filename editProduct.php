<?php
include("./checkLogin.php");
?>
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
    <?php
    include("./navbar.php");
    ?>
  
    <div class="mlTitle">
      <?php
      
      $productId = 0; $productName = ""; $productPrice = 0; $productImgUrl = ""; $productStock = 0;
      
      if(isset($_GET["productId"])){
        echo '<h1>Editar Producto</h1>';
        $productId = $_GET["productId"];
        $sql=$con->query("select * from producto where id='$productId'");
      if($datos=$sql->fetch_object()){
        $productName = $datos->nombre;
        $productPrice = $datos->precio;
        $productImgUrl = $datos->imgurl;
        $productStock = $datos->stock;
      }
      }else{
        echo '<h1>Agregar un producto</h1>';
      }
      ?>
        
    </div>
      
      <section class="myContact">
        <?php
        if(isset($_GET["productId"])){
          echo '<form class="row g-3" action="updateProduct.php" method="post">';
        }else{
          echo '<form class="row g-3" action="addProduct.php" method="post">';
        }
        ?>
        <form class="row g-3" action="updateProduct.php" method="post">
          <div class="col-md-4">
            <label class="form-label">Nombre</label>
            <input name="productId" value="<?php echo $productId; ?>" hidden="true">
            <input type="text" class="form-control" name="productName" placeholder="Nombre del producto..." value="<?php echo $productName; ?>">
          </div>
          <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Marca</label>
            <input type="text" class="form-control" name="productMarca" placeholder="Marca del producto...">
          </div>
          <div class="col-md-4">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="productPrice" value="<?php echo $productPrice; ?>" step="0.01">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Descripción</label>
            <input type="text" name="productDesc" class="form-control" placeholder="Descripción del producto...">
          </div>
          <div class="col-12">
            <label for="inputImgUrl" class="form-label">Imágen del producto</label>
            <input type="url" name="productImgUrl" class="form-control" value="<?php echo $productImgUrl; ?>">
          </div>
          <div class="col-md-3">
            <label class="form-label">Stock</label>
            <input type="number" class="form-control" name="productStock" value="<?php echo $productStock; ?>">
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">Tipo Producto</label>
            <select id="inputState" class="form-select">
              <option selected>Ropa</option>
              <option>Tecnología</option>
              <option>Muebles</option>
              <option>Etc.</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">Tipo Envío</label>
            <select id="inputState" class="form-select">
              <option selected>Con cargo</option>
              <option>Envío gratis</option>
              <option>...</option>
            </select>
          </div>
          <div class="panelButtons">
            <form class="d-flex col-10">
                <button type="submit" class="mlBtn">Guardar</button>
                <button type="submit" class="mlBtn-red">Cancelar</button>
            </form>
        </div>
        </form>
        
      </section>
</body>
</html>