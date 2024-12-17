<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["dni"]) && !empty($_POST["correo"])) {
        

        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("INSERT INTO usuarios (nombres, apellidos, dni, correo) VALUES ('$nombre', '$apellidos', $dni, '$correo')");

        
        if ($sql==1) {
           echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar ña persona</div>';
        }

    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>
