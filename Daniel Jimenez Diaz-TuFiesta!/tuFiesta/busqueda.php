<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de salón</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
<header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">

            </div>
        </div>
    </header>
    
    <main>
    <?php
        include 'conexion.php';
        $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //array con la informacion de la conexion de la base de datos
        //checamos la conexion en la base de datos                
        if(!$conexion){
            die("La conexion a la base de datos ha fallado: ". mysqli_connect_error());                
        } 
        
        $busqueda = $_POST['busquedas'];
        
        $result = mysqli_query($conexion, "SELECT nombreSalon, direccion, capacidad , descripcionSalon, idSalon FROM salon WHERE nombreSalon LIKE '%$busqueda%' or direccion LIKE '%$busqueda%'");
        $row = mysqli_fetch_assoc($result);
        
        $nombreS = $row['nombreSalon'];
        $direccionS= $row['direccion'];
        $descripcionS = $row ['descripcionSalon'];
        $cap= $row['capacidad'];

        $idS = $row ['idSalon'];
        $id = $_GET['id'];
        
        $count = mysqli_num_rows($result);

        if($count!=1){            
            echo"
            <div class='tarjetaBusqueda centrar-texto h-700'>
                <h3>Tu busqueda no arrojo ningun resultado
                    <p>Intentalo de nuevo</p>
                </h3>
            </div>";            
        }else{
            echo
            "<div class='tarjetaBusqueda'>
            <h3 class = 'centrar-texto h-700'>Salon:</h3>
            <p>$nombreS</p>
            <p>$direccionS</p>
            <p>$descripcionS</p>                
            <a class='boton boton-amarillo' href='organizar.php?ids=$idS&id=$id&cap=$cap'>¡Organizar Mi fiesta aqui!</a>
        </div>";    
        }
        

        //<p>$idS $id</p>          
    ?>
    </main>

    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Todos los Derechos Reservados 2020 &copy; </p>
        </div>
    </footer>    
</body>
</html>