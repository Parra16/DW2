<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Registro - Latter</title>
</head>
<body>
    <h3>Hola! {{ $nombre }} {{ $app }} {{ $apm }}.</h3>
    <h4>Se ha realizado registro en la paltaforma Latter</h4>
    <h4>Su información de incio de sesión es: </h4>
    <ul>
        <li>Usuario: {{ $usuario }}</li>
        <li>Contraseña: {{ $contrasena }}</li>
    </ul>

    <p>Atte. Equipo de trabajo Latter</p>
    
</body>
</html>