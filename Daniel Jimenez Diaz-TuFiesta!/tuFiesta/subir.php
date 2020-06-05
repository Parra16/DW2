<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        
        //DB details
        include 'conexion.php';
        //variables para la conexion        
        $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        //Create connection and select DB        
        
        // Check connection
        if(!$conexion){
            die("connection failed: ".mysqli_connect_error());
        }

        $descripcion = $_POST['desc'];
        $id = $_GET['id'];

        $query=("INSERT into fotossalon (idSalon,descripcion,fotossalon) VALUES ('$id,$descripcion,$imgContent')");
        
        if(mysqli_query($conexion,$query)){
            echo "File uploaded successfully.";
        }else{
            echo "Ha ocurrido un error interno" . $query . "<br>" . mysqli_error($conexion); 
        } 

    }else{
        echo "Please select an image file to upload.";
    }
}
?>