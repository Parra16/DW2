<?php


$insercion = false;

if (isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && !empty($_FILES['myfile']['tmp_name'])) {
    if (!is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        echo 'Error: el fichero encontrado no fue proesado por la subida correctamente'; //comprobamos que sea subido por un formulario
        exit;
    }
    $source = $_FILES['myfile']['tmp_name'];
    $nombre_imagen = $_FILES['myfile']['name'];
    $destination = __DIR__ . '/uploadP/' . $_FILES['myfile']['name'];
    if (is_file($destination)) {
        echo 'Error: ya existe almacenado un fichero con ese nombre';
        @unlink(ini_get('upload_tmp_dir') . $_FILES['myfile']['tmp_name']); //borra en carpeta temporal
        insertar($nombre_imagen);
        $insercion=true;
        header("location:index.php");
        exit;
        
        
        
    }
    if (!move_uploaded_file($source, $destination)) { //arroba: elomina el mensaje que envia el metodo
        echo 'error: No se ha podido mover el fichero enviado a la carpeta de destino';
        @unlink(ini_get('upload_tmp_dir') . $_FILES['myfile']['tmp_name']);
        header("location:crearPublicacion.php");
        exit;
    }
    
    
    if (!$insercion) {
        insertar($nombre_imagen);
        header("location:index.php");
    }
    
    
    
} else {
    echo "no inicio sesion";
}

function insertar($nombre_imagen) {
    include_once 'includes/conexion.php';
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $edad = trim($_POST['edad']);
    $estado = trim($_POST['estado']);
    $municipio = trim($_POST['municipio']);
    $usuario = trim($_POST['usuario']);
    $contrasenia = trim($_POST['contrasenia']);
    $telefono = trim($_POST['telefono']);
    $clave = trim($_POST['clave']);
    $correo = trim($_POST['correo']);

    $edad = intval($edad);
    var_dump($edad);
    $contrasenia_cif = password_hash($contrasenia, PASSWORD_BCRYPT, ['cost' => 4]);

    $sql = "INSERT INTO usuarios values (null,'$nombre','$apellido','$edad','$estado','$municipio','$usuario','$contrasenia_cif','$telefono','$clave','$correo');";
    $insert = mysqli_query($db, $sql);

    if ($insert) {
        $login = mysqli_query($db, " select * from usuarios where usuario = '$usuario'");
        if ($login && mysqli_num_rows($login) == 1) {
            $usuario = mysqli_fetch_assoc($login);
            session_start();
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['nombre'] = $usuario['nombre_usuario'];
            $_SESSION['apellido'] = $usuario['apellido'];
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $id = $usuario['id_usuario'];
            echo "la insercion se hizo correctamente";
        }
    }
    
    $login = mysqli_query($db, " insert into imagen values(null,'$nombre_imagen','$id') ");
    if ($login) {
        echo "subio imagen correctamente";
    } else {
        echo "fallo en subir imagen correctamente";
    }
    
    
}

?>