@extends('menu')

@section('seccion')
<div class="content">
    <h3 class="encabezado" align="center" style="color:#930707;">Lista de reportes</h3>
	<hr>
	<div class="">
		<div id="alerta"></div>
		<table class="tabla" id="t01" >
			<thead>
				<tr>
					<th class="id">ID</th><th class="no">Nombre</th>
						<th class="de">Descripción</th><th class="fe">Fecha</th>
						<th class="ho">Hora</th><th class="ac">Acción</th>
				</tr>
			<thead>
			<tbody>
			@foreach($persona as $item)
				<tr class="fila">
						<td class="id">{{$item->ID}}</td>
						<td class="no">{{$item->NOMBRE}} {{$item->APELLIDOPA}} {{$item->APELLIDOMA}}</td>
						<td class="de treport">{{$item->DESCRIPCION}}</td>
						<td class="fe">{{$item->FECHA}}</td>
						<td class="ho">{{$item->HORA}}</td>
						<td class="ac"><button class="btn btn-danger fas fa-trash-alt"></button></td>
				</tr>
			@endforeach()
			</tbody>
		</table>

		<hr>
	</div>
	
	<div>
		<h4 style="color:#930707;"align="center">Registrar reporte</h4>
		<div id="alerta2"></div>
			<form name="form1" method="post" action="" onsubmit="return rerep()" class="fondo">
				<div class="form-group col-md-5">
					<label class="control-label" for="conta">Empleado</label>
					<select class="control-llenarin" type="text" id="emp" name="emp" required>
						<option value=" "> </option>
						
					</select>
				</div>

				<div class="form-group col-md-5">
					<label class="control-label" for="diadesc">Reporte</label>
					<select class="control-llenarin" name="causa" id="causa" required>
						<option value="AUSENTE">AUSENTE</option>
						<option value="RETARDO">RETARDO</option>
						<option value="RETIRO TEMPRANO">RETIRO TEMPRANO</option>
					</select>
				</div>
				<div class="col-md-4" style="margin-left: 30px;">
                    <input type="submit" value="Generar reporte" class="btn btn-primary btn-lg" onsubmit="">
                </div>
			</form>
			<br>
		</div>
	</div>
</div>      
 
@endsection