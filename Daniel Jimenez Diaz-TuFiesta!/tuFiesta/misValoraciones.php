<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">    
    <title>Mis valoraciones</title>
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
            <h3 class="centrar-texto h-700">Mis valoraciones</h3>
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
                $idSa = mysqli_query($conexion, "SELECT idSalon
                                       FROM salon
                                       where idUsuario = '$id' ");
                $row = mysqli_fetch_assoc($idSa);
                $idS = $row['idSalon']; 
                
                $result = mysqli_query($conexion, "SELECT comentarioCliente, calificacionSalon, idComentario 
                                                   from comentarioCliente WHERE idSalon='$idS'");
                
                $row = mysqli_fetch_assoc($result);

                $comentarioC = $row['comentarioCliente'];
                $calificacionC = $row['calificacionSalon'];
                $idComentario = $row['idComentario'];

                $count = mysqli_num_rows($result);
                if($count!=1){
                    echo"                
                        <div class='tarjetaBusqueda centrar-texto h-700'>                            
                            <h3>Los clientes aun no han agregado comentarios sobre tu salon</h3>                            
                            <p>Vuelve mas tarde.</p>
                        </div>";                                           
                }else{
                    echo"                
                        <div class='tarjetaBusqueda centrar-texto h-700'>                            
                        <h5>Calificacion:</h5>                                             
                            <h4>$calificacionC</h4>                                             
                        <h5>Comentario</h5>                                             
                            <h4>$comentarioC</h4>                                                            
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
                <a href='fotosSalon.php?id=$id'>Fotos de mi salón</a>
                <a href='misValoraciones.php?id=$id'class='active'>Mis valoraciones</a>
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