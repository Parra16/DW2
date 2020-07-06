<?php

//$fecha = getdate();
//$actual = $fecha['year'].'/'.$fecha['mon'].'/'.($fecha['mday']-1);
//echo $actual;
$usuario = "paletox";
$sql = "select * from publicacion 
 			inner join usuarios on publicacion.id_usuario = usuarios.id_usuario
            inner join categoria on publicacion.id_categoria = categoria.id_categoria";
    if ($usuario!=null) {
       $sql = $sql." where usuarios.usuario = '$usuario'"; 
    }
    
    echo $sql;
    
    ?>