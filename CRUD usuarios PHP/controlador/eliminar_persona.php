<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("delete from usuarios where id_usuario=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al eliminar la persona</div>';
    }
}

?>