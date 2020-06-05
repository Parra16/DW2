<?php

include_once 'manipulaUsers.php';

$newUser = new manipulaUser();

$correo = $_POST['correo'];

$resultado = $newUser->createUser($correo);

if ($resultado == true) {
    echo "<script> 
            Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'La cuenta de correo ya esta registrada, intente otra',
            })
            </script>";
} else {
    echo "<script> 
             Swal.fire(
            'Felicidades!',
            'Se creo tu cuenta correctamente',
            'success'
            )
            </script>";
}


echo $resultado;

?>