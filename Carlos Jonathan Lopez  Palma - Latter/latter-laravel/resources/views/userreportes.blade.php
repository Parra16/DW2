@extends('menu')

@section('seccion')

<script>
        function fecha(){
            semana=["Domingo","Lunes","Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
            mes=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	        today=new Date();
	        did=today.getDay();
            din=today.getDate();
	        me=today.getMonth();
             a=today.getFullYear();
            var fechaa=semana[did]+", "+din+" de "+ mes[me]+" de "+a;
            document.getElementById("dia").innerHTML="Fecha de emisión: "+fechaa;
        }
        window.onload=function(){fecha();}
</script>

<div class="content" style="padding: 50px;">
    <h3 class="encabezado" align="center" style="color:#930707;">Reportes</h3>
    <hr>
    <div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <p class="label-rep">ID: {{session()->get('id')}} </p>
                <p class="label-rep">Nombre: {{session()->get('name')}} {{session()->get('ap')}}</p>
                </div>
        
            <div class="col-md-4">
                <p class="label-rep" id="dia"></p>
            </div>
        </div>
    </div>

    <div>
        <table class="tabla" id="t01">
                <tr>
                    <th class="thur">Descripción</th><th class="thur">Fecha</th  class="thur"><th class="thur">Hora</th><th class="thur">Monto</th>
                </tr>
            @foreach($persona as $item)
            <tr class="fila">
                <td class="treport">{{$item->DESCRIPCION}}</td>
                <td >{{$item->FECHA}}</td>
                <td >{{$item->HORA}}</td>
                <td >{{$item->MONTO}}</td>
            </tr>
            @endforeach()

        </table>
    </div>

    <div class="row">
        <div class="col-md-8"></div>
            <div class="col-md-4">
            </div>
        </div>
        <br>

        <div class="" style="padding-right: 130px;">
            <input type="submit" value="Imprimir" class="btn boton btn-info btn-lg" onclick="window.print();">
        </div>
    </div>
</div>

@endsection