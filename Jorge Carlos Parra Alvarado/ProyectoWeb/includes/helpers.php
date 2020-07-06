<?php


function consultaCategorias($conexion) {
    $categorias = mysqli_query($conexion, " select * from categoria");
    $result = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }
    return $result;
}

function consultaPublicacionUsuario($conexion, $usuario) {
    $sql = "select * from publicacion 
 			inner join usuarios on publicacion.id_usuario = usuarios.id_usuario
            inner join categoria on publicacion.id_categoria = categoria.id_categoria";
    if ($usuario != null) {
        $sql = $sql . " where usuarios.usuario = '$usuario'";
    }
    $publicaciones = mysqli_query($conexion, $sql);
    $result = array();

    if ($publicaciones && mysqli_num_rows($publicaciones) >= 1) {
        $result = $publicaciones;
    }
    return $result;
}

function consultaPublicacionCategoria($conexion, $categoria) {
    $sql = "select * from publicacion inner join usuarios on publicacion.id_usuario = usuarios.id_usuario "
            . "inner join categoria on publicacion.id_categoria = categoria.id_categoria "
            . "inner join imagen on usuarios.id_usuario = imagen.id_usuario";
    if ($categoria != null) {
        $sql = $sql . " where nombre_categoria = '$categoria'";
    }
    $publicaciones = mysqli_query($conexion, $sql);
    $result = array();

    if ($publicaciones && mysqli_num_rows($publicaciones) >= 1) {
        $result = $publicaciones;
    }
    return $result;
}
?>

