<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mis servicios</title>
</head>
<body>
<header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">

            </div>
        </div>
    </header>


    <main class='con-sidebar'>
        <section id='contenidos'>
            <h3 class="centrar-texto h-700">Fotos de mi salón</h3>
            <hr> 
            <?php
                $id = $_GET['id'];

                include 'conexion.php';
                //variables para la conexion        
                $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                
                //verificamos la conexion        
                if(!$conexion){
                    die("connection failed: ".mysqli_connect_error());
                }
                                
                $result = mysqli_query($conexion, "SELECT idImagen, idSalon, descripcion, img 
                                       FROM fotossalon
                                       where idSalon = '$id'");
                
                $count = mysqli_num_rows($result);
                
                if($count!=1){
                    echo"                
                        <div class='tarjetaBusqueda centrar-texto h-700'>                            
                            <h3>Comienza agregando imagenes</h3>                            
                            <form action='subir.php?id=$id' method='post' enctype='multipart/form-data'>                            
                                
                                <input type='file' name='image'>
                                
                                <label for='descripcion'>Agrega una descripcion para la imagen</label>
                                <input type='text' name='desc' id='descripcion' required>     

                                <input type='submit' name='submit' value='Subir'class='boton boton-amarillo'>
                            </form>
                        </div>";                                           
                }    
            ?>
            
        </section>
        
        <aside class= 'vertical-menu contenedor-menu'>
            <?php
            echo "
                <div class='ajustar-imagen'>
                    <img src='img/profile.png' alt='perfil'>
                </div>            
                <a href='informacionDeMiSalon.php?id=$id'>Información de mi salón</a>                
                <a href='fotosSalon.php?id=$id'class='active'>Fotos de mi salón</a>
                <a href='misValoraciones.php?id=$id'>Mis valoraciones</a>
                <a href='proximosEventos.php?id=$id'>Proximos eventos</a>
                <a href='cerrarSesion.php?id=$id' id='salir'>Salir</a>"; 
            ?>  
            
        </aside>
    </main>    

    
    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Todos los Derechos Reservados 2020 &copy; </p>
        </div>
    </footer>
</body>
</html>