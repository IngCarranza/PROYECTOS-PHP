<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["precio"]) && !empty($_POST["cantidad"]) && !empty($_POST["descripcion"])) {
        echo "TODO OK";

        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion"];

        $sql = $conexion->query("INSERT INTO producto(nombre, precio, cantidad, descripcion) VALUES ('$nombre', $precio, $cantidad, '$descripcion')");

        if ($sql) {
            // Redirigir a la misma página después de insertar el registro
            header("Location: " . $_SERVER['PHP_SELF']);
            exit; // Asegúrate de salir después de redirigir
        } else {
            echo '<div class="alert alert-danger">Error al registrar el producto</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>