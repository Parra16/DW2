<?php session_start(); ?>
<?php require_once 'cabecera.php'; ?>
<!DOCTYPE html>
<!--
    <div id="chat">Chat</div>
<!--Inicia cabezote
<header>
    <div id="logo">Logotipo</div>
    <div id="icono1" class="redes">x</div>
    <div id="icono2" class="redes">x</div>
    <div id="icono3" class="redes">x</div>
</header>
<!--Cierra cabezote
<!--Inicia naegacion
    <nav>
        <ul>
           <a href="a"> <li class="botones">boton1</li></a>
           <a href="a"><li class="botones">boton2</li></a>
           <a href="a"><li class="botones">boton3</li></a>
           <a href="a"><li class="botones">boton4</li></a>
           <a href="a"><li class="botones">boton5</li></a>
            
        </ul>
    </nav>
-->
<!--Cierra naegacion-->
<!--Inicia parte Superior-->
<!--    <div id="top">
        <ul>
            <li>
               <img src= "img/img0.jpg" width="100">
               <h1>Lorem Ipsum</h1>
               <p>Lorem Ipsum dolor sit arent, conectur adipiscing elit</p>
            </li>
            
            <li>
                <img src= "img/img1.jpg" width="100">
            <h1>Lorem Ipsum</h1>
            <p>Lorem Ipsum dolor sit arent, conectur adipiscing elit</p>
            </li>
           
            <li>
                <img src= "img/img2.jpg" width="100">
                <h1>Lorem Ipsum</h1>
                <p>Lorem Ipsum dolor sit arent, conectur adipiscing elit</p>
            </li>
        </ul>
    </div>-->
<!--cierra parte superior-->
<!--Inicia seccion-->



<section>
    <aside id="izq">
        <ul>
            <li>
                <a href="index.php">Mostrar Todo</a>
            </li>
            <?php
            $categorias = consultaCategorias($db);
            if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                    <li>
                        <a href="index.php?categoria=<?= $categoria['nombre_categoria'] ?>"><?= $categoria['nombre_categoria'] ?></a>
                    </li>
                    <?php
                endwhile;
            endif;
            ?>
        </ul>
    </aside>
    <article>
        <!--<img src="upload/fondo.jpg">-->    
        <?php
        $categoria = null;
        if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];
        }
        $publicaciones = consultaPublicacionCategoria($db, $categoria);
        if (!empty($publicaciones)):
            while ($publicacion = mysqli_fetch_assoc($publicaciones)):
                ?>
                <div id="publicacion">
                    
                    
                    <a href="perfil.php?usuario=<?= $publicacion['usuario']; ?>"><h3 id="usuario"><?= $publicacion['usuario']; ?> </h3></a>
                                     
                    <img id="top" src="uploadP/<?= $publicacion['nombre_imagen']; ?>" width="75"> 
                    <br>
                    <h3 style='text-align:left;background: #6699ff;'><?= $publicacion['usuario']; ?></h3>
                    <h3 id="fecha"><?= $publicacion['fecha_actual']; ?></h3>       
                    <h3 id="producto"><?= $publicacion['nombre_producto'];  ?></h3>
                    <img src="upload/<?= $publicacion['imagen']; ?>" width="600">
                    <br>Categoria:<u id="cat"><?= $publicacion['nombre_categoria']; ?></u>
                    <br>
                    Descripcion:
                    <br><?= $publicacion['descripcion']; ?>
                    <br>
                    Precio:
                    <br><?= $publicacion['precio']; ?>
                    <br>
                    <br>
                    <a href="perfil.php?usuario=<?= $publicacion['usuario']; ?>&id=<?= $publicacion['id_usuario'];?>"><input id="btnusuario" type="button" value="Visitar Vendedor"></a>
                </div>    
                <?php
            endwhile;
        else:
            echo "No hay publicaciones de esta categoria";
        endif;
        ?>




    </article>
    <aside id="der">
        <?php if (isset($_SESSION['usuario'])): ?> 
            <form>
                
                <h1>Bienvenido <?= $_SESSION['usuario']; ?></h1>
                <a href="crearPublicacion.php"><input type="button" value="Nueva Publucacion"></a>
                <a href="perfil.php?usuario=<?= $_SESSION['usuario']; ?>&id=<?= $_SESSION['id_usuario']; ?>"><input type="button" value="Perfil"></a>
                <a href="includes/cerrarSesion.php"><input type="button" value="Cerrar Sesion"></a>
            </form>
            <?php
        endif;
        if (!isset($_SESSION['usuario'])):
            ?>
            <h1>Comienza a publicar ahora</h1>


            <a href="login.html"><input type="button" value="Ingresar"></a>
            <a href="crearCuenta.php"><input type="button" value="Crear Cuenta"></a>
        <?php endif; ?>
    </aside>
</section>
<!--Cierra seccion-->

<!--pie de pagina-->
<!--<?php include "includes/pie.php"; ?>-->
