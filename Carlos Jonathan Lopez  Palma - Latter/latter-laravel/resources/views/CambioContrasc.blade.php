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
            <h3 class="encabezado" align="center" style="color:#930707;">Modificar Contraseña</h3>
            <hr>
            <br>
            @if(session('conta'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                    <li>{{session('conta')}}</li>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(session('successs'))
                <div class="alert alert-success alert-dismissable">
				    {{session('successs')}}
				    <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
			    </div>
            @endif
            
            <div class="row">
                <div class="col-md-8">
                    <p class="control-label">ID: {{session()->get('id')}} </p>
                    <p class="control-label">Nombre: {{session()->get('name')}} {{session()->get('ap')}}</p>
                </div>
            </div>

            <div>
                <br>
                <form method="POST" action="{{route('camcon',session()->get('id'))}}">
                    @method('PUT')
                    @csrf
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