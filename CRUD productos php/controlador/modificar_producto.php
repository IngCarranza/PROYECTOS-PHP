<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["precio"]) && !empty($_POST["cantidad"]) && !empty($_POST["descripcion"])) {
        include "modelo/conexion.php"; // Asegúrate de incluir la conexión aquí si no está ya incluida.

        $id = $_GET["id"]; // Recupera el ID del producto que se está modificando.
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion"];

        // Realiza la consulta para actualizar los datos del producto.
        $sql = $conexion->query("UPDATE producto SET 
            nombre = '$nombre', 
            precio = '$precio', 
            cantidad = '$cantidad', 
            descripcion = '$descripcion' 
            WHERE id_producto = $id");

        if ($sql) {
            // Redirige a la página principal o muestra un mensaje de éxito.
            echo "<div class='alert alert-success'>Producto modificado correctamente.</div>";
            header("Location: index.php"); // Cambia esto si tu archivo principal tiene otro nombre.
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el producto.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Todos los campos son obligatorios.</div>";
    }
}
?>