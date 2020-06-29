<?php

if(isset($_POST["id-habitacion"])){

	$valor = $_POST["id-habitacion"];

	$reservas = ControladorReservas::ctrMostrarReservas($valor);

	$indice = 0;

	if(!$reservas){

		$valor = $_POST["ruta"];

		$reservas = ControladorHabitaciones::ctrMostrarHabitaciones($valor);

		foreach ($reservas as $key => $value) {
			
			if($value["id_h"] == $_POST["id-habitacion"]){

				$indice = $key;

			}
		}
	}

	$planes = ControladorPlanes::ctrMostrarPlanes();

	/*=============================================
	DEFINIR PRECIOS DE TEMPORADA
	=============================================*/

	date_default_timezone_set("America/Bogota");
	$precio_mini = $reservas[$indice]["preciott"];
	$sinprecio= $reservas[$indice]["preciott"];

	$hoy = getdate();
	
			$precioContinental = $reservas[$indice]["continental_alta"];
			$precioAmericano = $reservas[$indice]["americano_alta"];
			$precioRomantico = $reservas[$indice]["preciott"]*.93;
			$precioLunaDeMiel = $reservas[$indice]["americano_alta"] + $planes[1]["precio_alta"];
			$precioAventura = $reservas[$indice]["americano_alta"] + $planes[2]["precio_alta"];
			$precioSPA = $reservas[$indice]["americano_alta"] + $planes[3]["precio_alta"];
			$precioAmigos=$reservas[$indice]["preciott"]*.95;
			$precioSeccion= $reservas[$indice]["continental_baja"];
			$precioAguante= $reservas[$indice]["continental_alta"];
	/*=============================================
	DEFINIR CANTIDAD DE DIAS DE LA RESERVA
	=============================================*/

	$fechaIngreso = new DateTime($_POST["fecha-ingreso"]);
	$fechaSalida = new DateTime($_POST["fecha-ingreso"]);
	$diff = $fechaIngreso->diff($fechaSalida);
	$dias = $diff->days;

	if($dias == 0){

		$dias = 1;
	}

}else{

	echo '<script> window.location="'.$ruta.'"</script>';

}


?>

<!--=====================================
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid bg-white p-0 pb-5" idHabitacion="<?php echo $_POST["id-habitacion"]; ?>" fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" fechaSalida="<?php echo $_POST["fecha-salida"]; ?>" dias="<?php echo $dias; ?>">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqReservas p-0">
				
				<!--=====================================
				CABECERA RESERVAS
				======================================-->
				
				<div class="pt-4 cabeceraReservas">
					
					<a href="javascript:history.back()" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>	

					<h6 class="float-right px-3">

					<?php if (isset($_SESSION["validarSesion"])): ?>

						<?php if ($_SESSION["validarSesion"] == "ok"): ?>

							<br>
							<a href="<?php echo $ruta;  ?>perfil" style="color:#FFCC29">Ver tus reservas</a>

						<?php endif ?>

					<?php else: ?>
						
						<br>
						<a href="#modalIngreso" data-toggle="modal" style="color:#FFCC29">Ver tus reservas</a>
						
					<?php endif ?>						

					</h6>

					<div class="clearfix"></div>

				</div>

				<!--=====================================
				CALENDARIO RESERVAS
				======================================	-->

				<div class="bg-white p-4 calendarioReservas">

				<?php if ($valor == $_POST["ruta"]): ?>

					<h1 class="pb-5 float-left">¡Está Disponible!</h1>

				<?php else: ?>

					<div class="infoDisponibilidad"></div>
					
				<?php endif ?>

					<div class="float-right pb-3">
							
						<ul>
							<li>
								<i class="fas fa-square-full" style="color:#847059"></i> No disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:#eee"></i> Disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:#FFCC29"></i> Tu reserva
							</li>
						</ul>

					</div>

					<div class="clearfix"></div>
			
					<div id="calendar"></div>

					<!--=====================================
					MODIFICAR FECHAS
					======================================	-->

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

					<form action="<?php echo $ruta; ?>reservas" method="post">

						<input type="hidden" name="id-habitacion" value="<?php echo $_POST["id-habitacion"]; ?>">

						<input type="hidden" name="ruta" value="<?php echo $_POST["ruta"]; ?>">

						<div class="container mb-3">

							<div class="row py-2" style="background:#509CC3">

								 <div class="col-6 col-md-3 input-group pr-1">
								
									<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" value="<?php echo $_POST["fecha-ingreso"]; ?>"  required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>

							 	<div class="col-6 col-md-3 input-group pl-1">
								
									<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida"  value="<?php echo $_POST["fecha-salida"]; ?>" readonly required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>

								<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
																
									<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">										
								</div>

							</div>

						</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerReservas" style="display:none">

				<h4 class="mt-lg-5">Código de la Reserva:</h4>
				<h2 class="colorTitulos"><strong class="codigoReserva"></strong></h2>

				<div class="form-group">
				  <label>Ingreso 12:00 am:</label>
				  <input type="text" class="form-control" value="<?php echo $_POST["fecha-ingreso"];?>" readonly>
				</div>

				<div class="form-group">
				  <label>Salida 3:00 pm:</label>
				  <input type="text" class="form-control" value="<?php echo $_POST["fecha-ingreso"];?>"  readonly>
				</div>

				<div class="form-group">
				  <label>tatto:</label>
			<input type="text" class="form-control" value="tatto <?php echo $reservas[$indice]["tipo"]." ".$reservas[$indice]["estilo"]; ?>" readonly>

				  <?php

				  	$galeria = json_decode($reservas[$indice]["galeria"], true);
				  
				  ?>

				  <img src="<?php echo $servidor.$galeria[0]; ?>" class="img-fluid">

				   <!-- ESCENARIO 2 Y 3 DE RESERVAS -->
				   <!-- <input type="text" class="form-control tituloReserva" value="" readonly>   -->

				</div>

				<div class="form-group">
				  <label><a href="#infoPlanes" data-toggle="modal">Escoge tu Paquete:</a> <small>(Precio sugerido para 2 personas en paquete romántico y amigos)</small></label>
				  <select class="form-control elegirPlan">
				  	<option value="<?php echo $sinprecio;?>,sin paquete,1">Sin paquete $<?php echo number_format($sinprecio); ?> </option>
					<option value="<?php echo $precioRomantico;?>,Paquete romantico,2">Paquete romántico $<?php echo number_format($precioRomantico); ?><small> por tatto (2 tatto para 2 personas )</small> </option>
					<option value="<?php echo $precioAmigos;?>,Paquete amigos,2">Paquete Amigos $<?php echo number_format($precioAmigos); ?> <small> por tatto (2 tatto para 2 personas )</small></option>
					<option value="<?php echo $precioAguante;?>,Paquete hasta,1">Paquete hasta que el cuerpo aguante $<?php echo number_format($precioAguante); ?><small>(1 tatto para 1 personas )</small> </option>
					<option value="<?php echo $precioSeccion;?>,Paquete seccion,1">Paquete Sección $<?php echo number_format($precioSeccion); ?> <small>(1 tatto para 1 personas )</small></option>
>

				  </select>
				</div>
				
				

				<div class="row py-4">

					<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">
						
						<h1 class="precioReserva">$<span><?php echo number_format($precio_mini);?></span> MXN</h1>

					</div>
					
					<div class="col-12 col-lg-6 col-xl-5">


					<?php if (isset($_SESSION["validarSesion"])): ?>

						<?php if ($_SESSION["validarSesion"] == "ok"): ?>

							<a href="<?php echo $ruta;?>perfil" 
								class="pagarReserva" 
								idHabitacion="<?php echo $reservas[$indice]["id_h"]; ?>"
								imgHabitacion="<?php echo $servidor.$galeria[0]; ?>"
								infoHabitacion="tatto <?php echo $reservas[$indice]["tipo"]." ".$reservas[$indice]["estilo"]; ?>"
								pagoReserva="<?php echo ($precio_mini*$dias);?>"
								codigoReserva=""
								fechaIngreso="<?php echo $_POST["fecha-ingreso"];?>"
								fechaSalida="<?php echo $_POST["fecha-ingreso"];?>"
								plan="sin paquete" 
								personas="1">
									<button type="button" class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
							</a>	


						<?php endif ?>
									
					<?php else: ?>

							<a href="#modalIngreso" data-toggle="modal"  
								class="pagarReserva" 
								idHabitacion="<?php echo $reservas[$indice]["id_h"]; ?>"
								imgHabitacion="<?php echo $servidor.$galeria[0]; ?>"
								infoHabitacion="Tatto <?php echo $reservas[$indice]["tipo"]." ".$reservas[$indice]["estilo"]; ?>"
								pagoReserva="<?php echo ($preciomini*$dias);?>"
								codigoReserva=""
								fechaIngreso="<?php echo $_POST["fecha-ingreso"];?>"
								fechaSalida="<?php echo $_POST["fecha-ingreso"];?>"
								plan="sin paquete" 
								personas="1">
									<button type="button" class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
							</a>						

					<?php endif ?>

					</div>
			
				</div>

			</div>

		</div>

	</div>

</div>


<!--=====================================
VENTANA MODAL PLANES
======================================-->

<div class="modal" id="infoPlanes">
	
	 <div class="modal-dialog modal-lg">
			
		<div class="modal-content">

			<div class="modal-header">
	        	<h4 class="modal-title text-uppercase">Tatto <?php echo $reservas[$indice]["tipo"].' '.$reservas[$indice]["estilo"]; ?></h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	      	</div>

	      	<div class="modal-body">

				<figure class="text-center">

       				<img src="<?php echo $servidor.$galeria[$indice]; ?>" class="img-fluid">

       			</figure>

				<p class="px-2"><?php echo $reservas[$indice]["descripcion_h"]; ?></p>

				<hr>

       			<div class="row">

       			<?php foreach ($planes as $key => $value): ?>

					<div class="col-12 col-md-6">
						
						<h2 class="text-uppercase p-2">Plan <?php echo $value["tipo"]; ?></h2>

						<figure class="center">
	       					<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid">
	       				</figure>

	       				<p class="p-2"><?php echo $value["descripcion"]; ?></p>

	       				<h4 class="px-2">Precio por paquete seccion y hasta que el cuerpo aguante</h4>

       					<p class="px-2">

	       				paquete hasta que el cuerpo aguante desde $ <?php echo number_format($value["continental_alta"]); ?> MXN<br>

	       				Paquete seccion desde $ <?php echo number_format($value["continental_baja"]); ?> MXN

	       				</p>


					</div>
       				
       			<?php endforeach ?>
       			
       			</div>

	      	</div>

	      	<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      		</div>

		</div>

	</div>

</div>