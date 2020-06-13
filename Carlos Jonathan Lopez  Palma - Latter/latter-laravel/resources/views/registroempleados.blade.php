@extends('menu')

@section('seccion')
	<div class="content">
		<h3 class="encabezado" align="center" style="color:#005892;">Registro de Empleado</h3>
		<br>
		<hr>
		<h4 class="encabezado" align="center" style="color:#930707;">Datos personales</h4>
		@if(session('alert'))
			<div class="alert alert-danger" text_align="center">
				Información personal repetida.  Campo 
				<strong>{{session('alert')}}</strong>
				<button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
			</div>
		@endif
		@if(session('alert2'))
			<div class="alert alert-danger" text_align="center">
				<strong>Selecciona un {{session('alert2')}}</strong>
				<button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
			</div>
		@endif
		@if(session('Success'))
			<div class="alert alert-success alert-dismissable">
				<strong>{{session('Success')}}</strong>
				<button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
			</div>
		@endif
		<form method="POST" action="{{ route('registraemp') }}" class="fondo">
			<!--  onsubmit="return validar()"-->
			@csrf
			<br>
			<div class="row">
				<div class="col-md-4 datain">
					<div class="form-group">
						<label class="control-label" for="Nombre">Nombre(s)</label>
						<input class="control-llenarin" type="text" placeholder="Nombre(s)"
							style="text-transform: uppercase;" name="nombres"
							value="{{ old('nombres') }}" id="nombres" onkeypress="return soloLetras(event)" required>
					</div>
							
					<div class="form-group">
						<label class="control-label" for="Apellido1">Apellido Paterno</label>
						<input class="control-llenarin" type="text" placeholder="Apellido Paterno"
							style="text-transform: uppercase;" id="app" name="app"
							value="{{ old('app') }}" onkeypress="return soloLetras(event)" required>
					</div>
							
					<div class="form-group">
						<label class="control-label" for="Apellido2">Apellido Materno</label>
						<input class="control-llenarin" type="text" placeholder="Apellido Materno"
							style="text-transform: uppercase;" id="apm" name="apm"
							value="{{ old('apm')}}" onkeypress="return soloLetras(event)" required>
					</div>
							
					<div class="form-group">
						<label class="control-label" for="fechana">Fehca de nacimiento</label>
						<?php 
							date_default_timezone_set('America/Mexico_City');
							$hoy = date("Y-m-d");
						?>
						<input class="control-llenarin" type="date" min="1970-12-31" max=<?php echo $hoy; ?>
							id="fechana" name="fechana" value="{{old('fechana')}}" required>
					</div>
	
					<div class="form-group">
						<label class="control-label" for="sexo">Sexo</label>
						<select class="control-combobx" name="sexo" id="sexo">
							<option value="Selecciona">Selecciona un Sexo</option>
							<option value="MUJER" {{ old('sexo') == 'MUJER' ? 'selected' : '' }}>MUJER</option>
							<option value="HOMBRE" {{ old('sexo') == 'HOMBRE' ? 'selected' : '' }}>HOMBRE</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="col-md-8">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label" for="curp">CURP</label>
							<input class="control-llenarin" type="text" placeholder="CURP"
								style="text-transform: uppercase;" name="curp" id="curp" 
								value="{{old('curp')}}" required>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="curp">RFC</label>
							<input class="control-llenarin" type="text" placeholder="RFC"
								style="text-transform: uppercase;" name="rfc" id="rfc" 
								value="{{old('rfc')}}" required>
						</div>

						<div class="form-group col-md-12">
							<label class="control-label" for="direc">Dirección</label>
							<input class="control-llenarin" type="text" placeholder="Dirección"
								style="text-transform: uppercase;" name="direc" id="direc" 
								value="{{old('direc')}}" required>
						</div>
								
						<div class="form-group form-group col-md-6">
							<label class="control-label" for="Teléfonol">Teléfono</label>
							<input class="control-llenarin" type="numeric" placeholder="TELÉFONO" 
								maxlength="10" name="tel" id="tel" onkeypress="return soloNumeros(event)" 
								value="{{old('tel')}}" required>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="Emaill">E-mail</label>
							<input class="control-llenarin" type="email" placeholder="E-MAIL" 
							   id="email" name="email" value="{{old('email')}}" required>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="nseg">No. de Seguro</label>
							<input class="control-llenarin" type="numeric" placeholder="No. DE SEGURO" 
							   id="nseg" name="nseg"onkeypress="return soloNumeros(event)" 
							   value="{{old('nseg')}}" required>
						</div>

					</div>
				</div>
			</div>
			<hr>
			<h4 class="encabezado" align="center" style="color:#930707;">Información Laboral</h4>
			<br>
			<div id="alerta2" class="alerta"></div>
			<div class="row ">
				<div class="form-group col-md-4 datala">
					<label class="control-label" for="puesto">Puesto</label>
					<select class="control-combobx" name="puesto" id="puesto">
						<option value="Selecciona">Selecciona un puesto</option>
						<option value="GERENTE" {{ old('puesto') == 'GERENTE' ? 'selected' : '' }}>GERENTE</option>
						<option value="SERVICIO AL CLIENTE" {{ old('puesto') == 'SERVICIO AL CLIENTE' ? 'selected' : '' }}>SERVICIO AL CLIENTE</option>
						<option value="CAJA" {{ old('puesto') == 'CAJA' ? 'selected' : '' }}>CAJA</option>
						<option value="ADMINISTRADOR" {{ old('puesto') == 'ADMINISTRADOR' ? 'selected' : '' }}>ADMINISTRADOR</option>
					</select>
				</div>

				<div class="col-md-8">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label" for="hora">Hora de entrada</label>
							<input class="control-llenarin" type="time" id="horae"
								placeholder="dd/mm/aaaa" name="horae" value="{{old('horae')}}">
						</div>
								
						<div class="form-group col-md-6">
							<label class="control-label" for="hora2">Hora de salida</label>
							<input class="control-llenarin" type="time" id="horas"
								placeholder="dd/mm/aaaa" name="horas" value="{{old('horas')}}">
						</div>
					</div>
							
					<div class="row form-group col-md-6">
						<label class="control-label" for="diadesc">Día de descanso</label>
						<select class="control-combobx" name="diadesc" id="diadesc" value="{{old('diadesc')}}">
							<option value="Selecciona">Selecciona un dia</option>
							<option value="LUNES" {{ old('diadesc') == 'LUNES' ? 'selected' : '' }}>LUNES</option>
							<option value="MARTES" {{ old('diadesc') == 'MARTES' ? 'selected' : '' }}>MARTES</option>
							<option value="MIERCOLES" {{ old('diadesc') == 'MIERCOLES' ? 'selected' : '' }}>MIERCOLES</option>
							<option value="JUEVES" {{ old('diadesc') == 'JUEVES' ? 'selected' : '' }}>JUEVES</option>
							<option value="VIERNES" {{ old('diadesc') == 'VIERNES' ? 'selected' : '' }}>VIERNES</option>
							<option value="SABADO" {{ old('diadesc') == 'SABADO' ? 'selected' : '' }}>SABADO</option>
							<option value="DOMINGO" {{ old('diadesc') == 'DOMINGO' ? 'selected' : '' }}>DOMINGO</option>
						</select>
					</div>
				</div>

			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="">
						<input type="reset" value="Cancelar" class="btn boton btn-danger btn-lg">
					</div>
					<div class="">
						<input type="submit" value="Guardar" class="btn btn-success btn-lg boton">
					</div>
				</div>
			</div>

					
		</form>
	</div>
	@endsection
	