<?php
    session_start();
?>

@extends('menu')

@section('seccion')
<?php
        if (!session()->get('loggedin')) { 
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Inicia sesión para acceder a la pagina.</h4>
            <p><a href='login'>Iniciar sesión!</a></p></div>
            ";
            exit;
        }
        $now = time();           
        if ($now > session()->get('expire')) {
            session_destroy();
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Tu sesión ha terminado!</h4>
            <p><a href='login'>Iniciar sesión!</a></p></div>";
            exit;
        }
        if (session()->get('puesto')!="ADMINISTRADOR") {
            session_destroy();
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Privilegios Insuficientes!</h4>
            <p><a href='login'>Iniciar sesión!</a></p></div>";
            exit;
        }
    ?>

	<div class="content">
		<h3 class="encabezado" align="center" style="color:#005892;">Lista de Empleados</h3>
            <hr>
            <div id="alerta"></div>
            <div class="row">
                <div class="col-md-8 " align="center">
                    <table class="tablaem" id="t01em">
                        <thead>
                            <tr>
                                <th class="id">ID</th><th  class="no">Nombre</th>
                                <th  class="pu">Puesto</th><th  class="co">Correo</th>
                                <th  class="te">Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($persona as $item)
                            <tr class="filaem">
                                <td class="id">{{$item->ID}}</td>
                                <td  class="no">{{$item->NOMBRE}} {{$item->APELLIDOPA}} {{$item->APELLIDOMA}}</td>
                                <td  class="pu">{{$item->PUESTO}}</td>
                                <td  class="co">{{$item->EMAIL}}</td>
                                <td  class="te">{{$item->TELEFONO}}</td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 scroll" align="center">
                    <h5 class="titem">Información</h5>
                    @if(session('error'))
                        <div class="alert alert-danger">
                        <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                            Información repetida.<br/> Campo <strong>{{session('error')}}</strong>
                        </div>
                    @endif
                    @if(session('selectp'))
                        <div class="alert alert-warning" text_align="center">
                            {{session('selectp')}}
                            <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                        </div>
                    @endif
                    @if(session('selectc'))
                        <div class="alert alert-warning" text_align="center">Selecciona un {{session('selectc')}}
                            <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                        </div>
                    @endif
                    @if(session('succcess'))
                        <div class="alert alert-success" text_align="center">{{session('succcess')}}
                            <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('actualizaemp') }}" class="fm">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <input class="input-emp" type="hidden" style="text-transform: uppercase;" 
                            id="id" name="id" value="{{ old('id') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="label-emp" for="Nombre">Nombre</label>
                            <input class="input-emp" type="text" placeholder="Nombre"
                                style="text-transform: uppercase;" id="nombres" name="nombres"
                                value="{{ old('nombres') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="label-emp" for="Email">Correo</label>
                            <input class="input-emp" type="email" placeholder="E-MAIL" 
								id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="label-emp" for="Teléfonol">Teléfono</label>
                            <input class="input-emp" type="numeric" placeholder="TELÉFONO" 
                                maxlength="10" id="tel" name="tel" onkeypress="return soloNumeros(event)" 
                                value="{{ old('tel') }}" required>
                        </div>

                        <div class="form-group row rw">
                            <div class="col-md-6">
                                <div class="form-group-em">
                                    <label class="label-emp" for="horal">Hora de entrada</label>
                                    <input class="input-emp" type="time" id="hora1" name="hora1" 
                                        value="{{ old('hora1') }}" required>
                                </div>
                            </div>
                            <div class="form-group-em col-md-6">
                                <label class="label-emp" for="hora2">Hora de salida</label>
                                <input class="input-emp" type="time" id="hora2" name="hora2" 
                                    value="{{ old('hora2') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
							<label class="label-emp" for="puesto">Puesto</label>
							<select class="cb-emp" id="puesto" name="puesto" style="text-transform: uppercase;">
                                <option value="Selecciona"></option>
                                <option value="GERENTE" {{ old('puesto') == 'GERENTE' ? 'selected' : '' }}>GERENTE</option>
								<option value="SERVICIO AL CLIENTE" {{ old('puesto') == 'SERVICIO AL CLIENTE' ? 'selected' : '' }}>SERVICIO AL CLIENTE</option>
								<option value="CAJA" {{ old('puesto') == 'CAJA' ? 'selected' : '' }}>CAJA</option>
								<option value="ADMINISTRADOR" {{ old('puesto') == 'ADMINISTRADOR' ? 'selected' : '' }}>ADMINISTRADOR</option>
							</select>
                        </div>
                        
                        <div class="form-group">
                            <label class="label-emp" for="diadesc">Día de descanso</label>
                            <select class="cb-emp" name="dia" id="dia">
                                    <option value="Selecciona"></option>
                                    <option value="LUNES" {{ old('dia') == 'LUNES' ? 'selected' : '' }}>LUNES</option>
									<option value="MARTES" {{ old('dia') == 'MARTES' ? 'selected' : '' }}>MARTES</option>
									<option value="MIERCOLES" {{ old('dia') == 'MIERCOLES' ? 'selected' : '' }}>MIERCOLES</option>
									<option value="JUEVES" {{ old('dia') == 'JUEVES' ? 'selected' : '' }}>JUEVES</option>
									<option value="VIERNES" {{ old('dia') == 'VIERNES' ? 'selected' : '' }}>VIERNES</option>
									<option value="SABADO" {{ old('dia') == 'SABADO' ? 'selected' : '' }}>SABADO</option>
									<option value="DOMINGO" {{ old('dia') == 'DOMINGO' ? 'selected' : '' }}>DOMINGO</option>
                            </select>
                        </div>

                        <div class="form-group row rw"style="margin-left: 20px;">
                            <div class="col-md-4" style="margin-left: 30px;">
                                <input type="submit" value="Actualizar" class="btn btn-warning btn-lg">
                            </div>
                            <div class="col-md-4" style="margin-left: 30px;">
                                <button  class="btn btn-danger btn-lg btnel">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
	</div>
    @endsection