<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.1/dist/bootstrap-table.min.css">
  </head>
  <body>

  <table
  id="table"
  data-toggle="table"
  data-height="460"
  data-search="true"
  data-sort-name="name"
  data-sort-order="desc">
  <thead>
    <tr>
      <th data-field="id" data-sortable="true">ID</th>
      <th data-field="name" data-sortable="true">Nombre</th>
      <th data-field="price" data-sortable="true">Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr class="tr-class-2">
      <th data-field="id" data-custom-attribute="star" data-sortable="true">0</th>
      <th data-sortable="true">A</th>
      <th data-field="description">Description</th>
    </tr>
    <tr class="tr-class-2">
      <th data-field="id" data-custom-attribute="star" data-sortable="true">1</th>
      <th  data-sortable="true">B</th>
      <th data-field="description">Description1</th>
    </tr>
  </tbody>
</table>

<script>
  function customSort(sortName, sortOrder, data) {
    var order = sortOrder === 'desc' ? -1 : 1
    data.sort(function (a, b) {
      var aa = +((a[sortName] + '').replace(/[^\d]/g, ''))
      var bb = +((b[sortName] + '').replace(/[^\d]/g, ''))
      if (aa < bb) {
        return order * -1
      }
      if (aa > bb) {
        return order
      }
      return 0
    })
  }
</script>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.1/dist/bootstrap-table.min.js"></script>
  </body>
</html>