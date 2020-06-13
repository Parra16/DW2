<?php
        include("ConBD.php");
        $con=conectar();
        $correo = $_POST['email'];

        $query1="SELECT ID FROM PERSONAS WHERE EMAIL='$correo';";
        $result=mysqli_query($con,$query1);

        $existe=0;
        while ($mostrar=mysqli_fetch_array($result)){
			$existe=1;
		}

        if($existe==1){
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-_";
            $flag=true;
            $query="SELECT U.CONTRASENA, U.IDPERSONA, U.USUARIO, P.NOMBRE, P.APELLIDOPA, P.APELLIDOMA 
            FROM CUENTAS U , PERSONAS P WHERE P.EMAIL='$correo' AND P.ID=U.IDPERSONA;";
            $result=mysqli_query($con,$query);

            $contbd=mysqli_fetch_array($result['CONTRASENA']);
            $nombre=mysqli_fetch_array($result['NOMBRE']);
            $app=mysqli_fetch_array($result['APELLIDOPA']);
            $apm=mysqli_fetch_array($result['APELLIDOMA']);
            $user=mysqli_fetch_array($result['USUARIO']);

            while($flag){
                $contra = "";
                for($i=0;$i<11;$i++) {
                    $contra .= substr($str,rand(0,64),1);
                }
                $contra2 = password_hash($contra, PASSWORD_DEFAULT);
                    if($contra2!=$contbd){
                        $flag=false;
                }
            }
            $quaery="UPDATE cuentas SET CONTRASENA='$contra2' WHERE IDPERSONA='$contbd[IDPERSONA]'";
            $result=mysqli_query($con,$quaery);
            
            if (Mail::to($request->input('email'))->send(new CorreoRecuperacion($nombre,$app,$apm,$usuario,$contra))) {
                echo'si';
            } else {
                echo'no';
            }
        }else{
            echo'inexistente';
        }
    
?>