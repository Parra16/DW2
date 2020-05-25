<?php
    session_start();
    
	include("ConBD.php");
	$con=conectar();
	
    $co = $_POST['cont'];

    $query = "SELECT CONTRASENA FROM cuentas WHERE IDPERSONA = '$_SESSION[id]'";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $hash = $row['CONTRASENA'];
    if (password_verify($co, $hash)) {	
        echo 'CORRECTA';
    }else{
        echo 'INCORRECTA';
    }
?>