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
            <div class="barra">

            </div>
        </div>
    </header>

    <main class="con-sidebar">

        <section id="contenidos">
            <div class="">
                <h3 class="centrar-texto h-700">Organizar fiesta</h3>
                <hr>
                <?php
                    //obtenemos el id del usuaroi, este lo vamos a estar ocupando durante toda la pagina y sesión 
                    $id = $_GET['id'];                                                       
                echo"
                    <div class='tarjetaBusqueda'>      
                        <h3 class='centrar-texto h-400'>Busca un salon para comenzar</h3>                  
                        <form METHOD='POST' action='busqueda.php?id=$id'>                        
                            <input type='search' placeholder='Buscar salones de fiestas' name='busquedas' required>
                            <input type='submit' class='boton-amarillo boton' value='Buscar'>                                               
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
            <a href='anfitrionFiestas.php?id=$id' id='infoFiesta'>Información de mi fiesta</a>
            <a href='anfitrionOrganizar.php?id=$id' class='active' id='organizarFiesta'>Organizar fiesta</a>
            <a href='anfitrionComentar.php?id=$id' id='infoSalon'>Comentarios sobre el salón</a>            
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