<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mis fiestas</title>
</head>

<body>
    <script src="js/scriptsAnfitrion.js"></script>

    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra" id="cambiarTituloBarra">

            </div>
        </div>
    </header>

    <main class="con-sidebar">
        <section id="contenidos">
            <h3 class="centrar-texto h-700">Dejar un comentario para el salón</h3>
            <hr>
            <div>
                <?php
                //obtenemos el id del usuario, este lo vamos a estar ocupando durante toda la pagina y sesión 
                $id = $_GET['id'];
                $ids = $_GET['ids'];                             
                echo"
                    <div class='tarjetaBusqueda centrar-texto h-700'>                                    
                        <form  method='post' action='guardarComentario.php?id=$id&ids=$ids'method='POST'>
                            
                            <label for='Calificacion'>¿Que calificacion le das al salón?</label>
                            <input type='number' min='1' max='10' step='0' id='calificacion' name='cal' required> 
                            
                            <label for='comentario'>Escribe tu comentario: </label>
                            <textarea name='coment' id='comentario' cols='30' rows='30' maxlength='200'  required></textarea>                            
                            <div>
                                <input type='submit' value='Enviar' class='boton-amarillo boton'>
                            </div>
                        </form>
                    </div>"
                ?>
            </div>
        </section>

        <aside class="vertical-menu contenedor-menu">
            <div class="ajustar-imagen">
                <img src="img/profile.png" alt="perfil">
            </div>
            <?php
            echo "    
            <a href='anfitrionFiestas.php?id=$id'  id='infoFiesta'>Información de mi fiesta</a>
            <a href='anfitrionOrganizar.php?id=$id' id='organizarFiesta'>Organizar fiesta</a>
            <a href='anfitrionComentar.php?id=$id&ids=$ids' class='active' id='infoSalon'>Comentarios sobre el salón</a>            
            <a href='anfitrionComentarios.php?id=$id' id='comentarios'>Mis comentarios</a>
            <a href='cerrarSesion.php' id='salir'>Salir</a>"
            ?>
        </aside>
    </main>

    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Todos los Derechos Reservados 2020 &copy; </p>
        </div>
    </footer>
</body>
</body>

</html>