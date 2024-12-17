<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombres"]) && !empty($_POST["apellidos"]) && !empty($_POST["dni"]) && !empty($_POST["correo"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombres"];
        $apellido = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("UPDATE usuarios SET nombres='$nombre', apellidos='$apellido', dni='$dni', correo='$correo' WHERE id_usuario=$id");

        if ($sql) {
            header("Location: index.php");
        } else {
            echo '<div class="alert alert-danger">Error al actualizar el registro</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>';
    }
}

?>
