<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear cuenta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <div>
        <?php 
            include 'conexion.php';
            $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //array con la informacion de la conexion de la base de datos
            //checamos la conexion en la base de datos
            if(!$conexion){
                die("La conexion a la base de datos falló: ". mysqli_connect_error());                
            }

            //consulta para comprobar si el email ya existe en la BD
            $checkEmail = "SELECT * FROM usuario WHERE email = '$_POST[correo]'";
            //el resultado de la consulta se almacena en una variable
            $result = $conexion-> query($checkEmail);
            //la variable contiene el resultado de la consulta
            
            $count = mysqli_num_rows($result);

            //si el contador == 1 significa que el email ya esta en la BD
            if($count==1){
                echo " <div>        
                            <p>Este email ya está registrado, por favor intenta con otro.</p>
                            <p><a href='registro.html'class='boton boton-amarillo contenedor'>Intentar de nuevo</a></p>
                        </div>";
            }else{
                //si el email no existe los datos del form se registran en la base y la cuenta se va a crear
                $correo = $_POST["correo"];
                $pass = $_POST["pass"];
                $tipo = $_POST["tipo"];
                
                //convertimos la contraseña en hash
                $passHash = password_hash($pass, PASSWORD_DEFAULT);
                //insertamos en la BD
                $query = "INSERT INTO usuario (email, tipoUsuario, contraseña) values ('$correo', '$tipo', '$passHash')";

                if(mysqli_query($conexion, $query)){
                    echo"<div class='contenedor'>
                            <h3>Tu cuenta ya ha sido creada, ya puedes iniciar sesión</h3>
                            <a href='index.html' class='boton boton-amarillo'>Iniciar sesion</a>
                         </div>";
                }else{
                    echo "Error: " . $query . "<br>" . mysqli_error($conexion);
                }
            
            }
            mysqli_close($conexion);
        ?>
    </div>
</body>
</html>