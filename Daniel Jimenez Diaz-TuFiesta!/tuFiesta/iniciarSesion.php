<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">    
    <title>Iniciar Sesión</title>
</head>
<body>
    <?php
        //incluimos el archivo de la conexion
        include 'conexion.php';
        //variables para la conexion        
        $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        //verificamos la conexion
        if(!$conexion){
            die("connection failed: ".mysqli_connect_error());
        }
        
        //datos enviados desde el index.html
        $email = $_POST['correo'];
        $pass = $_POST['pass'];       
        
        //consulta de la base de datos 
        $result = mysqli_query($conexion, "SELECT email, tipoUsuario, contraseña FROM usuario where email = '$email' ");
        //variable que tiene el resultado de la consulta
        $row = mysqli_fetch_assoc($result);        
        //variable que contiene la contraseña que esta en la base de datos 
        $hash = $row['contraseña'];
        //variable que contiene el tipo de usuario de la base de datos 
        $user = $row['tipoUsuario']; 
        // en el siguiente if se verifica si la contraseña coincide con el hash de la base de datos y se crea una sesión
        if(password_verify($_POST['pass'], $hash)){
            $_SESSION['loggedin'] = true;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;
            
            if($user=='Anfitrion'){
                header("location:anfitrionComentar.html");
            }else{
                header("location:dueño.html");
            }
        }else{
            echo "<div>
                    <p>Los datos que introduciste son incorrectos, verificalos<p>
                    <p><a href='index.html' class='boton boton-amarillo'>Volver a intentar</a></p>
                  </div>";
                 
        }

    ?>
</body>
</html>