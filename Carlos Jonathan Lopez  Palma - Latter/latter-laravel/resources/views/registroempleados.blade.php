@extends('menu')

@section('seccion')
	<div class="content">
		<h3 class="encabezado" align="center" style="color:#005892;">Registro de Empleado</h3>
		<br>
		<hr>
		<h4 class="encabezado" align="center" style="color:#930707;">Datos personales</h4>
		<form name="form1" method="POST" action="{{ route('registraemp') }}" class="fondo">
			<!--  onsubmit="return validar()"-->
			@csrf
			<div id="alerta" class="alerta"></div>
			<br>
			<div class="row">
				<div class="col-md-4 datain">
					<div class="form-group">
						<label class="control-label" for="Nombre">Nombre(s)</label>
						<input class="control-llenarin" type="text" placeholder="Nombre(s)"
							style="text-transform: uppercase;" id="nombres" name="nombres"
							onkeypress="return soloLetras(event)" required>
					</div>
							
					<div class="form-group">
						<label class="control-label" for="Apellido1">Apellido Paterno</label>
						<input class="control-llenarin" type="text" placeholder="Apellido Paterno"
							style="text-transform: uppercase;" id="app" name="app"
							onkeypress="return soloLetras(event)" required>
					</div>
							
					<div class="form-group">
						<label class="control-label" for="Apellido2">Apellido Materno</label>
						<input class="control-llenarin" type="text" placeholder="Apellido Materno"
							style="text-transform: uppercase;" id="apm" name="apm"
							onkeypress="return soloLetras(event)" required>
					</div>
							
					<div class="form-group">
						<label class="control-label" for="fechana">Fehca de nacimiento</label>
						<input class="control-llenarin" type="date" min="1930-12-31" max="2020-01-01"
						   id="fechana" name="fechana" required>
					</div>
	
					<div class="form-group">
						<label class="control-label" for="sexo">Sexo</label>
						<select class="control-combobx" name="sexo" id="sexo" style="text-transform: uppercase;">
							<option value="mujer">Mujer</option>
							<option value="hombre">Hombre</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="col-md-8">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label" for="curp">CURP</label>
							<input class="control-llenarin" type="text" placeholder="CURP"
								style="text-transform: uppercase;" name="curp" id="curp" required>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="curp">RFC</label>
							<input class="control-llenarin" type="text" placeholder="RFC"
								style="text-transform: uppercase;" name="rfc" id="rfc" required>
						</div>

						<div class="form-group col-md-12">
							<label class="control-label" for="direc">Dirección</label>
							<input class="control-llenarin" type="text" placeholder="Dirección"
								style="text-transform: uppercase;" name="direc" id="direc" required>
						</div>
								
						<div class="form-group form-group col-md-6">
							<label class="control-label" for="Teléfonol">Teléfono</label>
							<input class="control-llenarin" type="numeric" placeholder="TELÉFONO" 
								maxlength="10" name="tel" id="tel" onkeypress="return soloNumeros(event)" 
								required>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="Emaill">E-mail</label>
							<input class="control-llenarin" type="email" placeholder="E-MAIL" 
							   id="email" name="email" required>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="nseg">No. de Seguro</label>
							<input class="control-llenarin" type="numeric" placeholder="No. DE SEGURO" 
							   id="nseg" name="nseg"onkeypress="return soloNumeros(event)" required>
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
					<select class="control-combobx" name="puesto" id="puesto" style="text-transform: uppercase;">
						<option value="Gerente">Gerente</option>
						<option value="Servicio al cliente">Servicio al cliente</option>
						<option value="Caja">Caja</option>
						<option value="Administrador">Administrador</option>
					</select>
				</div>

				<div class="col-md-8">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label" for="hora">Hora de entrada</label>
							<input class="control-llenarin" type="time" id="horae"
								placeholder="dd/mm/aaaa" name="horae">
						</div>
								
						<div class="form-group col-md-6">
							<label class="control-label" for="hora2">Hora de salida</label>
							<input class="control-llenarin" type="time" id="horas"
								placeholder="dd/mm/aaaa" name="horas">
						</div>
					</div>
							
					<div class="row form-group col-md-6">
						<label class="control-label" for="diadesc">Día de descanso</label>
						<select class="control-combobx" name="diadesc" id="diadesc">
							<option value="LUNES">LUNES</option>
							<option value="MARTES">MARTES</option>
							<option value="MIERCOLES">MIERCOLES</option>
							<option value="jJUEVES">JUEVES</option>
							<option value="VIERNES">VIERNES</option>
							<option value="SABADO">SABADO</option>
							<option value="DOMINGO">DOMINGO</option>
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
	