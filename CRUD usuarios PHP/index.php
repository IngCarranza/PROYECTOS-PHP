<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<script>
    function eliminar() {
        var respuesta = confirm("¿Estás seguro que deseas eliminar al usuario?");
        return respuesta;
    }
</script>




    <?php
    include("modelo/conexion.php");
    include "controlador/eliminar_persona.php";
    ?>

    
<div class="container"> <!-- Contenedor principal para el diseño de Bootstrap -->
    <div class="row"> <!-- Fila para organizar los elementos en columnas -->
        <div class="col-md-4 p-4"> <!-- Columna para el formulario -->
            <form method="POST">
                <h2 class="text-center">Registro de Usuario</h2>
                <?php 
                include "modelo/conexion.php";
                include "controlador/registro_persona.php";
                ?>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos">
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="number" class="form-control" name="dni">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo">
                </div>

                <button type="submit" class="btn btn-outline-info" name="btnregistrar" value="ok">Enviar</button>
            </form> 
        </div>

        <div class="col-md-8 p-4"> <!-- Columna para la tabla -->
            <table class="table">
                <thead class="bg">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">DNI</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = $conexion->query("SELECT * FROM usuarios");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_usuario ?></td>
                            <td><?= $datos->nombres ?></td>
                            <td><?= $datos->apellidos ?></td>
                            <td><?= $datos->dni ?></td>
                            <td><?= $datos->correo ?></td>
                            <td>
                                <a href="modificar_persona.php?id=<?= $datos->id_usuario ?>" class="btn btn-small btn-success">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <a href="ver_persona.php?id=<?= $datos->id_usuario ?>" class="btn btn-small btn-primary">
                                <i class="fa-solid fa-eye"></i>
                                </a>

                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_usuario ?>" class="btn btn-small btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
