<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Inicio Secion</title>
<link href="styleInicio.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="login">
<h2>ISUIT </h2>
<form action="" method="post">
<label>Usuario:</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Contraseña :</label>
<input id="password" name="password" placeholder="**********" type="password"><br><br>
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</body>
</html>