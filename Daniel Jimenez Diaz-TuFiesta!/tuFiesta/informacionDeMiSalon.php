<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mi salón</title>
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
            <h3 class="centrar-texto h-700">Información de mi salón</h3>
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
                
                $result = mysqli_query($conexion, "SELECT nombreSalon, direccion, capacidad,descripcionSalon,idSalon 
                                                   FROM salon 
                                                   where idUsuario = '$id'");
                $row = mysqli_fetch_assoc($result);

                $idS = $row['idSalon'];
                $nombreS = $row ['nombreSalon'];
                $direccion = $row['direccion'];
                $descripcion =$row['descripcionSalon'];
                $capacidad = $row['capacidad'];
                
                $count = mysqli_num_rows($result);

                if($count!=1){
                    echo"
                        <div class='tarjetaBusqueda centrar-texto h-700'>   
                            <h3>Comienza agregando informacion de tu salón</h3>
                            <form method='post' action='guardarInfo.php?idS=$idS&id=$id' method='POST'>
                    
                                <label for='nombre'>Nombre del salón</label>        
                                <input type='text' name='nom' id='nombre'required>
                    
                                <label for='descripcion'>Descripcion</label>
                                <textarea name='desc' id='descripcion' cols='30' rows='10'required></textarea>
                    
                                <label for='ubicacion'>ubicacion</label>
                                <textarea name='ub' id='ubicacion' cols='30' rows='30' maxlength='200' required></textarea>
                                    
                                <label for='capacidad'>Capacidad</label>
                                <input type='number' name='cap' id='capacidad' min='1' max='1000'required>
                                
                                <input type='submit' value='Guardar Informacion' class='boton boton-amarillo'>
                            </form>
                        </div>    
                    ";                    
                }else{
                    echo"
                        <div class='tarjetaBusqueda centrar-texto h-700'>   
                            <h3>Nombre Salon</h3>
                                <h4>$nombreS</h4>
                            <h3>Direccion</h3>
                                <h4>$direccion</h4>                                
                            <h3>Capacidad</h3>
                                <h4>$capacidad personas</h4>                                
                            <h3>Descripcion</h3>
                                <h4>$descripcion</h4>                                
                            <h3></h3>
                                <h4></h4>                                                            
                        </div>    
                    ";
                }
                mysqli_close($conexion); 
                //<a href='serviciosQueOfrezco.php?id=$id'>Servicios que ofrezco</a>
            ?>
            
        </section>
        <aside class= 'vertical-menu contenedor-menu'>
            <?php
            echo "
                <div class='ajustar-imagen'>
                    <img src='img/profile.png' alt='perfil'>
                </div>            
                <a href='informacionDeMiSalon.php?id=$id'class='active' id='infoFiesta'>Información de mi salón</a>                
                <a href='fotosSalon.php?id=$id'>Fotos de mi salón</a>
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