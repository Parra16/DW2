<!doctype html>
<html lang="en">

<head>
	<title>Latter - Inicio de Sesión</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
		integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
	<link rel=" stylesheet" href="static/css/custom.css">
</head>

<body>
	<div class="container">
		<div class="col-lg-12" align="right" style="position: absolute; top: 60; left: 0;">
			<a href="{{route('index')}}">
				<img src="static/img/ini.png" alt="Ayuda" class="inicio">
				<div class="caption"></div>
			</a>
		</div>
	</div>
	<br>

	<div class="container-fluid" style="margin-top:30px" ;>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="loginBox">
						<img src="static/img/logo2.png" class="img-responsive" alt="PHP MySQL logos">
						<h2>Inicio de Sesión</h2>
						@if(session('alert'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								{{session('alert')}}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
  								</button>
							</div>
						@endif
						<form method="POST" action="{{route('entrar')}}">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control input-lg" name="user" id="user"
									placeholder="Usuario" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-lg" name="password" id="password"
									placeholder="Contraseña" required>
							</div>
							<button type="submit" class="btn btn-block btn-primary">Entrar</button>
						</form>
						<br>
						<hr>
						<p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse"
								class="text"><strong>Recuperar contraseña</strong></a>
						</p>
						@if(session('error'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								{{session('error')}}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
  								</button>
							</div>
						@endif
						@if(session('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								{{session('success')}}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
  								</button>
							</div>
						@endif
						<div class="collapse" id="showForm">
							<div class='well'>
								<form method="POST" action="{{route('recupe')}}">
								@method('PUT')
								@csrf
									<div class="form-group">
										<input type="email" class="form-control" name="email" id="email"
											placeholder="Ingresa el correo asociado a la cuenta." required>
									</div>
									<button type="submit" class="btn btn-dark">Recuperar contrseña</button>
								</form>
							</div>
						</div>
					</div><!-- /.loginBox -->
				</div><!-- /.card -->
			</div><!-- /.col -->
		</div>
		<!--/.row-->
	</div><!-- /.container -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
		crossorigin="anonymous"></script>
	<script src="static/JS/revisar.js"></script>
</body>

</html>