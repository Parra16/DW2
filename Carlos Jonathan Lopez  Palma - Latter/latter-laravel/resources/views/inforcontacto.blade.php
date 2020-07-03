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
    ?>

<div class="content" style="padding: 40px;">
    <h3 class="encabezado" align="center" style="color:#930707;">Información de contacto</h3>
    <hr>
    <div>
        <br>
        <div class="col-md-8" style="text-align: center;"align="center">
        @if(session('error'))
			<div class="alert alert-danger" text_align="center">
				Información repetida.  Campo 
				<strong>{{session('error')}}</strong>
				<button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
			</div>
		@endif
            @if(session('alert'))
                <div class="alert alert-success alert-dismissable">
				    {{session('alert')}}
				    <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
			    </div>
		    @endif
        </div>
        <div class="row">
            <div class="col-md-8">
                <p class="control-label">ID: {{session()->get('id')}} </p>
                <p class="control-label">Nombre: {{session()->get('name')}} {{session()->get('ap')}}</p>
                
                <div>
                    <br>
                    <form method="POST" action="{{route('editar.infocontacto')}}">
                    @method('PUT')
                    @csrf
                        <div class="row">
                            <div class="col-md-8 row">
                                <div class="col-md-2 icon_info">
                                    <i class="fa fa-envelope-square"></i>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="control-label" for="Emaill">E-mail</label>
                                    <input class="control-llenarin" type="email" placeholder="E-MAIL" 
                                    id="email" name="email" value='{{ $email }}' required>
                                </div>
                            </div>
                            <div class="col-md-8 row row">
                                <div class="col-md-2 icon_info">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="form-group form-group col-md-10">
                                    <label class="control-label" for="Teléfonol">Teléfono</label>
                                    <input class="control-llenarin" type="numeric" placeholder="TELÉFONO" 
                                        maxlength="10" name="tel" id="tel" onkeypress="return soloNumeros(event)"
                                        value='{{ $tel }}' required>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class=" boton btn btn-success"> Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection