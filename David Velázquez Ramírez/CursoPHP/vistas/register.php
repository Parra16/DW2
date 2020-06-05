<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Web Register</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>

<body>

    <form action="/CursoPHP/includes/newUser.php" method="POST">
        <h2>Registrarse</h2>
        <p>Nombre: <br>
            <input type="text" name="name"></p>
        <p>Apellio Paterno: <br>
            <input type="text" name="ap"></p>
        <p>Apellio Materno: <br>
            <input type="text" name="am"></p>
        <p>Correo: <br>
            <input type="text" name="correo"></p>
        <p>Password: <br>
            <input type="password" name="pass"></p>
        <p class="center"><input type="submit" value="Crear cuenta"></p>

    </form>

    Inicia sesion <a href="/CursoPHP/index.php">Login</a>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>