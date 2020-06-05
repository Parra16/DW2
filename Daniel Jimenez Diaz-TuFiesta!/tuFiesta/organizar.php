<!DOCTYPE html>
<html lang="en">
<head>
    <title>Organizar Fiesta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">          
</head>
<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra" id="cambiarTituloBarra">

            </div>
        </div>
    </header>    
    <?php        
        $ids = $_GET['ids'];
        $id = $_GET['id'];
        $cap = $_GET['cap'];
                                
        echo"
        <form METHOD='POST' action='guardarFiesta.php?ids=$ids&id=$id' class='sesion contenedor contenido-centrado'>
            <fieldset>
                <legend>¡Ingresa la informacion de tu fiesta!</legend>
                
                <label for='fecha'>Fecha de fiesta:</label>
                <input type='date' id='fecha' name='fechaFiesta' required>

                <label for='cantidad'>Cantidad de invitados:</label>
                <input type='number' min='1' max='$cap' step='0' id='cantidad' name='cantidadFiesta' required>      
                
                <label for='opciones'>Tipo de fiesta</label>
                <select id='opciones' name='tipo' required>
                    <option value='' disabled selected>-- Seleccione--</option>
                    <option value='Boda'>Bautizo</option>
                    <option value='Boda'>Boda</option>
                    <option value='XV años'>XV Años</option>
                    <option value='Reunion Formal'>Reunion formal</option>
                    <option value='Cumpleaños'>Cumpleaños</option>
                </select>   
                
                <label for='horaE'>Hora de inicio:</label>
                <input type='time' id='horaE' name ='horaEntrada'min='7:00' max:'3:00'required >

                <label for='horaS'>Hora de salida:</label>
                <input type='time' id='horaS' name='horaSalida'min='7:00' max:'3:00' required>   
                
                <input type='submit' value='Organizar mi fiesta' class='boton boton-amarillo'>
            </fieldset>
        </form>";    
    ?>
    
    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Todos los Derechos Reservados 2020 &copy; </p>
        </div>
    </footer>    
</body>
</html>