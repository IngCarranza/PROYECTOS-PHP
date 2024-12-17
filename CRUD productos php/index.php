<?php
// Incluir la conexión a la base de datos
include "modelo/conexion.php";

// Lógica para eliminar producto
if (isset($_GET["id"])) {
  $id = $_GET["id"]; // Recupera el ID enviado por el enlace

  // Consulta para eliminar el producto
  $sql = $conexion->query("DELETE FROM producto WHERE id_producto = $id");

  if ($sql) {
    echo "<script>
                alert('Producto eliminado correctamente');
                window.location = 'index.php'; // Redirige para evitar duplicar la acción
              </script>";
  } else {
    echo "<script>alert('Error al eliminar el producto');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD en PHP y MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <h1 class="text-center">PRODUCTOS REGISTRADOS</h1>

  <div class="container-fluid row">
    <form class="col-4 p-3" method="POST">
      <h3 class="text-center text-secondary">Registra aquí un producto</h3>
      <?php
      // Incluir lógica para registrar productos
      include "controlador/registro_persona.php";
      ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Precio</label>
        <input type="number" class="form-control" name="precio">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cantidad</label>
        <input type="number" class="form-control" name="cantidad">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripción</label>
        <input type="text" class="form-control" name="descripcion">
      </div>

      <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>

    <div class="col-8 p-4">
      <table class="table">
        <thead class="bg">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Recuperar productos de la base de datos
          $sql = $conexion->query("SELECT * FROM producto");
          while ($datos = $sql->fetch_object()) { ?>
            <tr>
              <td><?= $datos->id_producto ?></td>
              <td><?= $datos->nombre ?></td>
              <td><?= $datos->precio ?></td>
              <td><?= $datos->cantidad ?></td>
              <td><?= $datos->descripcion ?></td>
              <td>
                <a href="modificar_producto.php?id=<?= $datos->id_producto ?>" class="btn btn-small btn-warning"><i
                    class="fa-solid fa-pen-to-square"></i></a>
                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_producto ?>"
                  class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Confirmación para eliminar un producto
    function eliminar() {
      return confirm("¿Estás seguro de que deseas eliminar este producto?");
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>