<?php
include("./checkLogin.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercado Libre Argentina</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.1/dist/bootstrap-table.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css"/>
    <link rel="icon" href="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/5.21.22/mercadolibre/favicon.svg">

  </head>
  <body>
  <?php
  include("./navbar.php")
  ?>
  <section class="Productos">
        <h2 class="ProductosText">Editar Productos</h2>
    </section>
    <a href="./editProduct.php"> 
      <button type="submit" class="mlBtn">Añadir Producto</button>
    </a>
  <table
  id="table" data-toggle="table" data-height="460" data-search="true" data-sort-name="id" data-sort-order="asc">
  <thead>
    <tr>
      <th data-field="id" data-sortable="true">ID</th>
      <th data-field="name" data-sortable="true">Nombre</th>
      <th data-field="price" data-sortable="true">Precio</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = "Select * from producto";
    $resultado = mysqli_query($con, $query);

    while($currentItem = mysqli_fetch_assoc($resultado)){
      echo '
      <tr class="tr-class-2">
      <th data-field="id" data-custom-attribute="star" data-sortable="true">'. $currentItem["id"] . '</th>
      <th data-sortable="true">'. $currentItem["nombre"] . '</th>
      <th data-field="description">$'. $currentItem["precio"] . '</th>
      <th><form action="editProduct.php" method="GET"><button name="productId" value="'. $currentItem["id"] .'" class="mlBtn-green">Editar</button></form> 
      <form action="deleteProduct.php" method="POST"><button name="productId" value="'. $currentItem["id"] .'" class="mlBtn-red">Eliminar</button></form> 
      </th>
    </tr>
      '
      //<button name="delete" class="mlBtn-red" data-productid="'. $currentItem["id"] .'" data-whatever="'. $currentItem["nombre"] . '"  data-toggle="modal" data-target="#exampleModal">Eliminar</button>
      ;
    }

    mysqli_close($con);
    ?>
  </tbody>
</table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input readonly="true" type="text" class="form-control" id="recipient-name">
        </div>
        <div class="modal-footer">
          <button type="button" class="mlBtn-green" data-dismiss="modal">Cerrar</button>
          <button type="button" class="mlBtn-red" id="deleteBtn">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.1/dist/bootstrap-table.min.js"></script>

    <!--Modal-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('whatever')
      var modal = $(this)
      var _productId = button.data('productid')
      modal.find('.modal-body input').val(recipient)
      //modal.find('.modal-title').text(_productId);
      })
    </script>
    
  </body>
</html>
<?php

?>