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

        <section id="contenidos" class="centrar-texto">
            <h3 class="centrar-texto h-700">Mis comentarios</h3>
            <hr>
            <?php
                include 'conexion.php';
                $id = $_GET['id']; 

                $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //array con la informacion de la conexion de la base de datos
                //checamos la conexion en la base de datos                
                if(!$conexion){
                    die("La conexion a la base de datos ha fallado: ". mysqli_connect_error());                
                } 
                
                $result = mysqli_query($conexion, "SELECT comentarioCliente, calificacionSalon, idComentario 
                                                   from comentarioCliente WHERE idUsuario='$id'");
                
                $row = mysqli_fetch_assoc($result);

                $comentarioC = $row['comentarioCliente'];
                $calificacionC = $row['calificacionSalon'];
                $idComentario = $row['idComentario'];

                $count = mysqli_num_rows($result);
                if($count!=1){
                    echo"
                    <div class='tarjetaBusqueda centrar-texto h-700'>
                        <h3>No tienes comentarios aun.</h3>
                    </div>";               
                }else{
                    echo "
                    <div class='tarjetaBusqueda'>        
                        <h5>Calificacion:</h5>                                             
                            <h4>$calificacionC</h4>                                             
                        <h5>Comentario</h5>                                             
                            <h4>$comentarioC</h4>                                                            
                            <a class='boton boton-amarillo' href='eliminacion.php?idComentario=$idComentario&id=$id'>Eliminar comentario</a>
                    </div>";
                }   
                //<a class='boton boton-amarillo' href='edicion.php?id=$id&comentarioC=$comentarioC&calificacionC=$calificacionC&idComentario=$idComentario>Editar comentario</a>               
            ?>
        </section>

        <aside class="vertical-menu contenedor-menu">
            
            <div class="ajustar-imagen">
                <img src="img/profile.png" alt="perfil">
            </div>

            <?php
            echo "    
            <a href='anfitrionFiestas.php?id=$id' id='infoFiesta'>Información de mi fiesta</a>
            <a href='anfitrionOrganizar.php?id=$id' id='organizarFiesta'>Organizar fiesta</a>
            <a href='anfitrionComentar.php?id=$id' id='infoSalon'>Comentarios sobre el salón</a>
            <a href='anfitrionComentarios.php?id=$id' class='active' id='comentarios'>Mis comentarios</a>
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