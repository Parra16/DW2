<?php
session_start();
require_once 'cabecera.php';
?>

<?php
$usuario = null;
$id = null;
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$login = mysqli_query($db, " select * from usuarios
         inner join imagen on usuarios.id_usuario = imagen.id_usuario
         where usuarios.id_usuario = '$id'");


if ($login && mysqli_num_rows($login) == 1) :
    $actual = mysqli_fetch_assoc($login);
    if (!empty($actual)):
        ?>
        <div id='publicacion1'>
            <img style="float: top" src="uploadP/<?= $actual['nombre_imagen']; ?>" width="250"> 

            <br>
            <br>
            <h2 style=";background: #6699ff;">Usuario:<?= $actual['usuario']; ?></h2>
            <br>
            <br>
            <h2 style=";background: #6699ff;">Nombre:<?= $actual['nombre_usuario']; ?></h2>
            <br>
            <br>
            <h2 style=";background: #6699ff;">Apellido:<?= $actual['apellido']; ?></h2>
            <br>
            <br>
            <h2 style=";background: #6699ff;">Edad:<?= $actual['edad']; ?></h2>
            <br>
            <br>
            <h2 style=";background: #6699ff;">Estado:<?= $actual['estado']; ?></h2>
            <br>
            <br>
            <h2 style=";background: #6699ff;">Municipio:<?= $actual['municipio']; ?></h2>    
            <br>
            <br>
            <h2 style=";background: #6699ff;">Telefono:<?= $actual['telefono']; ?></h2>    
            <?php
        endif;
    endif;
    ?>
</div>







<?php
$publicaciones = consultaPublicacionUsuario($db, $usuario);
if ($publicaciones != null):
    while ($publicacion = mysqli_fetch_assoc($publicaciones)):
        ?>
        <div id="publicacion2">



            <br>
            <h3 style='text-align:left;background: #6699ff;'><?= $publicacion['usuario']; ?></h3>
            <h3 id="fecha"><?= $publicacion['fecha_actual']; ?></h3>       
            <h3 id="producto"><?= $publicacion['nombre_producto']; ?></h3>
            <img src="upload/<?= $publicacion['imagen']; ?>" width="600">
            <h3 style='text-align: center; background:#6699ff;'><br>Categoria:<u id="cat"><?= $publicacion['nombre_categoria']; ?></u>
                <br>
                Descripcion:
                <br><?= $publicacion['descripcion']; ?></h3>
            <br>
            <br>
            <?php
            if (isset($_SESSION['id_usuario'])) :


                if ($_SESSION['id_usuario'] == $id) :
                    ?>
                    <a style='background:#6699ff;'href="eliminaPublicacion.php?id=<?= $publicacion['id_publicacion']; ?>"><input id="btneliminar" type="button" value="Eliminar"></a>
                    <?php else: ?>



                <?php
                endif;
            endif;
            ?>




        </div>    
        <?php
    endwhile;
endif;
?>
