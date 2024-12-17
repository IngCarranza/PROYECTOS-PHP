<?php
include "modelo/conexion.php";

$id= $_GET["id"];

$sql = $conexion->query("select * from usuarios WHERE id_usuario = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container"> <!-- Contenedor principal para el diseño de Bootstrap -->
    <div class="row"> <!-- Fila para organizar los elementos en columnas -->
        <div class="col-md-4 p-3 m-auto"> <!-- Columna para el formulario -->
            <form method="POST">
                <h2 class="text-center">Vista de los Usuario</h2>
                <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                <?php 
                #include "modelo/conexion.php";
                include "controlador/modificar_persona.php";
                while ($datos=$sql->fetch_object()) {?>
                    
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="nombres" value="<?= $datos->nombres ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="<?= $datos->apellidos ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="number" class="form-control" name="dni" value="<?= $datos->dni ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>" readonly>
                </div>
                <?php }
                ?>

            
                <a href="index.php" type="submit" class="btn btn-secondary"  >Volver</a>
                
            </form> 
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>