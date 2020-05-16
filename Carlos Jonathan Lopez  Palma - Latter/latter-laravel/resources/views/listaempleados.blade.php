@extends('menu')

@section('seccion')

	<div class="content">
		<h3 class="encabezado" align="center" style="color:#005892;">Lista de Empleados</h3>
            <hr>
            <div id="alerta"></div>
            <div class="row">
                <div class="col-md-8 " align="center">
                    <table class="tablaem" id="t01em">
                        <tbody>
                            <tr>
                                <th style="width: 10px;">ID</th><th>Nombre</th><th style="width: 100px;">Puesto</th><th style="width: 90px;">Correo</th><th style="width: 20px;">Teléfono</th>
                            </tr>
                            @foreach($persona as $item)
                            <tr class="filaem">
                                <td class="temw">{{$item->ID}}</td>
                                <td>{{$item->NOMBRE}} {{$item->APELLIDOPA}} {{$item->APELLIDOMA}}</td>
                                <td>{{$item->PUESTO}}</td>
                                <td>{{$item->EMAIL}}</td>
                                <td>{{$item->TELEFONO}}</td>
                            </tr>
                            @endforeach()
                        <t/body>
                    </table>
                </div>
                <div class="col-md-4 scroll" align="center">
                    <h5 class="titem">Información</h5>
                    <form name="form1" method="post" action="" onsubmit="return validarli();" class="fm">
                        <div class="form-group">
                            <input class="input-emp" type="hidden" style="text-transform: uppercase;" 
                            id="id" readonly>
                        </div>

                        <div class="form-group">
                            <label class="label-emp" for="Nombre">Nombre</label>
                            <input class="input-emp" type="text" placeholder="Nombre"
                            style="text-transform: uppercase;" id="nombres" readonly>
                        </div>

                        <div class="form-group">
                            <label class="label-emp" for="Email">Correo</label>
                            <input class="input-emp" type="email" placeholder="E-MAIL" 
								id="email" required>
                        </div>

                        <div class="form-group">
                            <label class="label-emp" for="Teléfonol">Teléfono</label>
                            <input class="input-emp" type="numeric" placeholder="TELÉFONO" 
								maxlength="10" id="tel" onkeypress="return soloNumeros(event)" required>
                        </div>

                        <div class="form-group row rw">
                            <div class="col-md-6">
                                <div class="form-group-em">
                                    <label class="label-emp" for="horal">Hora de entrada</label>
                                    <input class="input-emp" type="time" id="hora1" name="hora1" required>
                                </div>
                            </div>

                            <div class="form-group-em col-md-6">
                                <label class="label-emp" for="hora2">Hora de salida</label>
                                <input class="input-emp" type="time" id="hora2" name="hora2" required>
                            </div>
                        </div>

                        <div class="form-group">
							<label class="label-emp" for="puesto">Puesto</label>
							<select class="cb-emp" id="puesto" style="text-transform: uppercase;">
                            <option value="-"> </option>
                                <option value="GERENTE">Gerente</option>
								<option value="SERVICIO AL CLIENTE">Servicio al cliente</option>
								<option value="CAJA">Caja</option>
								<option value="ADMINISTRADOR">Administrador</option>
							</select>
                        </div>
                        
                        <div class="form-group">
                            <label class="label-emp" for="diadesc">Día de descanso</label>
                            <select class="cb-emp" name="dia" id="dia">
                                    <option value=" "> </option>
                                    <option value="LUNES">LUNES</option>
									<option value="MARTES">MARTES</option>
									<option value="MIERCOLES">MIERCOLES</option>
									<option value="jJUEVES">JUEVES</option>
									<option value="VIERNES">VIERNES</option>
									<option value="SABADO">SABADO</option>
									<option value="DOMINGO">DOMINGO</option>
                            </select>
                        </div>

                        <div class="form-group row rw"style="margin-left: 20px;">
                            <div class="col-md-4" style="margin-left: 30px;">
                                <input type="submit" value="Actualizar" class="btn btn-warning btn-lg" onsubmit="">
                            </div>
                            <div class="col-md-4" style="margin-left: 30px;">
                                <button  class="btn btn-danger btn-lg btnel">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>    
	</div>
    @endsection
    
