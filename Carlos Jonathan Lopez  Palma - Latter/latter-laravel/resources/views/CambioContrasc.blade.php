@extends('menu')

@section('seccion')

		<div class="content" style="padding: 40px;">
            <h3 class="encabezado" align="center" style="color:#930707;">Modificar Contraseña</h3>
            <hr>
            <br>
            <div id="alerta"></div>
            <div class="row">
                <div class="col-md-8">
                    <p class="control-label">ID: </p>
                    <p class="control-label">Nombre: </p>
                </div>
            </div>

            <div>
                <br>
                <form name="form1" method="post" onsubmit="return iguales()">
                    <div class="form-group col-md-6">
					    <label class="control-label" for="conta">Contraseña actual</label>
						<input class="control-llenarin" type="password" 
						   id="conta" name="conta" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label class="control-label">Nueva contraseña</label>
                        <input class="form-control" type="password" data-toggle="password" 
					    	name="nco" id="nco" required>
                    </div>

                    <div class="form-group col-md-6">
						<label class="control-label">Repita contraseña</label>
                        <input class="form-control" type="password" data-toggle="password" 
							name="rco" id="rco" required>
                    </div>
                     <br>

                    <div class="">
                        <td><button class=" boton btn btn-success"> Cambiar</button></td>
                    </div>

                </form>
            </div>
        </div>
@endsection