function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
	
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = "8-37-39-46-13";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


function entrada() {
    var user = document.getElementById('user').value;
    var dataen = 'user='+user;
    $.ajax({
        type:'post',
        url:'static/PHP/RegistraEntrada.php',
        data:dataen,
        success:function(resp){
            var la = resp.length;
            var st = resp.slice(0, la);
            if(st==="entrada"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a><strong>Entrada registrada</strong></div>';  
            }else if(st==="salida"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a><strong>Salida registrada</strong></div>';  
            }else if(st==="terminada"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert">&times;</a><strong>Jornada terminada</strong></div>';  
            }else if(st==="false"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a><strong>ID incorrecto</strong></div>';  
            }
        }
    });
    return false;
}

function recuperacion(){
    alert('SI');
    var email = document.getElementById('email').value;
    var dataen = 'email='+email;
    
    $.ajax({
        type:'post',
        url:'RecuperaPassEnCo.php',
        data:dataen,
        success:function(resp){
            alert(resp);
            if(resp==="si"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a><strong>Correo enviado</strong></div>';  
            }else if(resp=='no'){
                document.getElementById("alerta").innerHTML='<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a><strong>Error al enviar</strong></div>';  
            }else if(resp=='inexistente'){
                document.getElementById("alerta").innerHTML='<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a><strong>Cuenta desconocida</strong></div>';  
            }
            
        }
    });
    return false;
}

