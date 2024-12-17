<?php

include "modelo/conexion.php";

$id=$_GET["id"];

$sql=$conexion->query("select * from producto where id_producto=$id ")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<form class="col-4 p-3 m-auto" method="POST">
    <h3 class="text-center text-secondary">Modificar producto</h3>
    <?php
    include "controlador/modificar_producto.php";
    while ($datos=$sql->fetch_object()) { ?>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control"name="nombre" value="<?= $datos->nombre ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Precio</label>
    <input type="number" class="form-control"name="precio" value="<?= $datos->precio ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cantidad</label>
    <input type="number" class="form-control"name="cantidad" value="<?= $datos->cantidad ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
    <input type="tetx" class="form-control"name="descripcion" value="<?= $datos->descripcion ?>">
  </div>    
<?php }
    ?>
  
  

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar producto</button>
</form>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>