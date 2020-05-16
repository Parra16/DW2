@extends('menu')

@section('seccion')

<div class="content" style="padding: 40px;">
    <h3 class="encabezado" align="center" style="color:#930707;">Información de contacto</h3>
    <hr>
    <div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <p class="control-label">ID: {{ $persona[0]->ID }} </p>
                <p class="control-label">Nombre: {{ $persona[0]->NOMBRE }} {{ $persona[0]->APELLIDOPA }} {{ $persona[0]->APELLIDOMA }}</p>
                <div class="col-md-4">
                    <p class="label-rep" id="dia"></p>
                </div>
                    
                <div>
                    <br>
                    <form method="post" action="ActCoTe.php">
                        <div class="form-group col-md-6">
							<label class="control-label" for="Emaill">E-mail</label>
							<input class="control-llenarin" type="email" placeholder="E-MAIL" 
							   id="email" name="email" value='{{ $persona[0]->EMAIL }}' required>
                        </div>
                            
                        <div class="form-group form-group col-md-6">
							<label class="control-label" for="Teléfonol">Teléfono</label>
							<input class="control-llenarin" type="numeric" placeholder="TELÉFONO" 
                                maxlength="10" name="tel" id="tel" onkeypress="return soloNumeros(event)"
                                value='{{ $persona[0]->TELEFONO }}' required>
						</div>
                        <br>
                        <div class="">
                            <td><button class=" boton btn btn-success"> Editar</button></td>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection