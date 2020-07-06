<?php
session_start();
include_once 'cabecera.php';
?>

<form class="form-register" method="post" action="subirPublicacion.php" enctype="multipart/form-data" onclick="subirArchivo()">
    
<!--    <p><label for="nombre">Nombre del producto</label></p>-->
    <h1 style="background:#24303c; text-align: center;">Crear Publicacion</h1>
    <input class="controls" type="text" name="nombre" placeholder="Nombre del producto"/>
    <!--<p><label for="descripcion">Descripcion</label></p>-->
    <input class="controls" type="text" name="descripcion" placeholder="Descripcion del producto"/>
    <!--<p><label for="precio">Precio</label></p>-->
    <input class="controls" type="text" name="precio" placeholder="Precio"/>
    <select name="categoria" id="categoria" class="botons">
            <?php
            $categorias = consultaCategorias($db);
            if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                    <option class="botons" value=<?= $categoria['id_categoria'] ?>>
                        <?= $categoria['nombre_categoria'] ?>
                    </option>
                    <?php
                endwhile;
            endif;
            ?>
        </select>
    
    <input class="botons" type="file" name="myfile"/>
    <input class="botons"type="submit" value="Publicar">
</form>
