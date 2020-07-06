<?php

include_once 'conexion.php';


$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

//var_dump($contrasenia);
//echo '<br>';
//var_dump($usuario);
//echo '<br>';

$login = mysqli_query($db, " select * from usuarios where usuario = '$usuario'");

if ($login && mysqli_num_rows($login) == 1) {
    $usuario = mysqli_fetch_assoc($login);
    
    // Comprobar la contraseña
    $verify = password_verify($contrasenia, $usuario['contrasenia']);
    if ($verify) {
        // Utilizar una sesión para guardar los datos del usuario logueado
        session_start();
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        echo $_SESSION['usuario'] . '<br>';
        echo $_SESSION['id_usuario'] . '<br>';
        
        header('Location:../index.php');
    } else {
        // Si algo falla enviar una sesión con el fallo                    
        $_SESSION['error_login'] = "Login incorrecto!!";
        header('Location:../login.html');
        echo $_SESSION['error_login'];
    }
    //header('Location:../index.php');
} else {

    echo $_SESSION['error_login'];
    header('Location:../login.html');
    //echo 'usuaio o contraseña equivocados';
}

    