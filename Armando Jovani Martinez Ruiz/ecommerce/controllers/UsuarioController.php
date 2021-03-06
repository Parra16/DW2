<?php

require_once 'models/Usuario.php';
require_once 'controllers/ProductoController.php';

//Controlador usuario
class UsuarioController{


    //Inicio de sesión
    public function login(){

    
        if (isset($_POST)) {

            $usuario = new Usuario();

            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identify = $usuario->login();

            if($identify != false){

                //Crear la sesión del usuario

                    $_SESSION['usuario'] = $identify;

            
                    if ($identify->rol == 'admin') {
                      $_SESSION['admin'] = true;
                    }
               
            }else{
                echo '<script language="javascript">alert("Revisa nuevamente tus datos");</script>'; 
            }   
        }

        header("Location:".base_url);
        ob_end_flush(); 
    }

    //Cierra sesión del usuario
    public function logout(){

        if(isset($_SESSION['usuario'])){
            unset($_SESSION['usuario']);
        //   session_destroy();
    
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
         //    session_destroy();
         }
        }

         header("Location:".base_url);
         ob_end_flush(); 
    
    }
    
    //registra un nuevo usuario
    public function registro(){

        if(isset($_POST)){

            //Recibe los datos
            $nombre= $_POST['nombre'];
            $apellidos=$_POST['apellidos'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $usuario = new Usuario();

            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);

            //encriptar password
            $passwordSegura = password_hash($password, PASSWORD_BCRYPT , ['cots'=>2,]);
            $usuario->setPassword($passwordSegura);

            $registro = $usuario->guardar();

            if($registro==true){
    
               echo '<script language="javascript">alert("Registro completado correctamente");</script>';
               
            }else{
                echo '<script language="javascript">alert("Correo electrónico repetido");</script>'; 
            }

        }   
        
        $productos = new ProductoController();
        $productos->index();
        //require_once 'views/producto/destacados.php';
        // header("Location:".base_url);  
    }

    public function modal(){
        requiere('views/usuarios/login.php');
    }
}


?>