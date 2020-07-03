<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Recuperación de Contraseña - Latter</title>
</head>
<body>
    <h3>Hola! {{ $nombre }} {{ $app }}.</h3>
    Se ha solicitado una recuperación de contraseña en <br> 
    la plataforma Latter para su cuenta: <strong>{{ $usuario }}</strong>
    
    Su nueva contraseña es: <strong> {{ $contrasena }} </strong>
    
    <p>Recomendamos que, una vez haya iniciado sesión, cambie su contraseña.</p>

    Atte. Equipo de trabajo Latter.
    
</body>
</html>