(function() {
    'use strict';
    document.addEventListener('DOMContentLoaded', function() {
        //arreglos para las etiquetas
        var etiquetas = ['P', 'P', 'P', 'P', 'P'];
        var etiquetasFormulario = ['P', 'a', 'a', 'a', 'a', 'a', 'TEXTAREA', 'a'];

        //arreglos de textos para las etiquetas 
        var textosEtiquetas = ['Fecha de mi fiesta: ', 'Numero de invitados: ', 'Tipo de Fiesta: ', 'Hora de inicio: ', 'Hora de salida: '];
        var textosEtiquetasInfoSalon = ['Calificar experiencia:', '&#9733;', '&#9733;', '&#9733;', '&#9733;', '&#9733;', 'Dejar un comentario:', 'Enviar'];

        //variable que guarda la seccion de contenidios 
        var contenidos = document.querySelector('#contenidos');
        var tituloContenido = document.querySelector('#cambiarTituloBarra');
        var form = document.forms[0];
        //variable para comprobar si ya se creo una seccion 
        var creados = false; //si es falso no se ha creado ningun objeto
        var fiesta = false; //si es falso el anfitrion no tiene ninguna fiesta planeada

        var titulo = 0;
        var btnInfoFiesta = document.getElementById('infoFiesta'),
            btnInfoSalon = document.getElementById('infoSalon'),
            btnOrganizarFiesta = document.getElementById('organizarFiesta'),
            btnComentarios = document.getElementById('comentarios'),
            btnSalir = document.getElementById('salir'),
            overlay = document.getElementById('overlay'),
            popup = document.getElementById('popup');



        //el siguiente codigo agrega la seccion de mi fiesta         
        btnInfoFiesta.addEventListener('click', function() {
            if (creados == true) {
                removerObjetos();
                creados = false;
            } else {
                for (var i = 0; i < etiquetas.length; i++) {
                    //asignamos el valor de la etiqueta
                    var nuevaEtiqueta = document.createElement(etiquetas[i]);
                    //asignamos el texto que va a llevar la etiqueta
                    var nuevoTexto = document.createTextNode(textosEtiquetas[i]);
                    //le agregamos el texto a la etiqueta
                    nuevaEtiqueta.appendChild(nuevoTexto);
                    //le agregamos la etiqueta al contenedor
                    contenidos.appendChild(nuevaEtiqueta);
                }
                creados = true
            }
        });

        //el siguiente codigo agrega la seccion de agregar comentario para el salón
        btnInfoSalon.onclick = function() {
            if (fiesta == false) {
                alert("No ha organizado ninguna fiesta, para realizar un comentario organice una fiesta.");
                removerObjetos();
            }
        }

        removerObjetos = function() {
            var objetosCreados = document.querySelectorAll("section");
            objetosCreados.parentNode.removeChild(objetosCreados);
        }


    });
})()