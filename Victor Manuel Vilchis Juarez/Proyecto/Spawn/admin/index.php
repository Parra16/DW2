<?php
include "../configs/config.php";
include "../configs/funciones.php";

if(isset($logear)){
  $username = clear($username);
  $password = clear($password);

  $q = $mysqli->query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'");

  if(mysqli_num_rows($q)>0){
    $r = mysqli_fetch_array($q);
    $_SESSION['id'] = $r['id'];
    redir("./");
  }else{
    alert("Los datos no son validos");
    redir("./");
  }
}


if(!isset($_SESSION['id'])){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Admin Panel</title>
  </head>
  <body style="background: #08f;color:#fff">
     <center>
        <form style="padding-top:10%;" method="post" action="">
          <div class="centrar_login">
            <label><h2><i class="fa fa-key"></i> Iniciar Sesión Como Administrador</h2></label>
            <div class="form-group">
              <input style="padding:10px;color:#333;width:40%" type="text" class="form-control" placeholder="Usuario" name="username"/>
            </div>

            <div class="form-group">
              <input style="padding:10px;color:#333;width:40%" type="password" class="form-control" placeholder="Contraseña" name="password"/>
            </div>
            <br><br>

            <div class="form-group">
              <button name="logear" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
            </div>
          </div>
        </form>
      </center>
  </body>
  </html>
  <?php
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Tienda en Linea</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../css/estilo.css">


  <link rel="stylesheet" href="../fontawesome/css/all.css"/>
  <script type="text/javascript" src="../fontawesome/js/all.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <nav class="navbar navbar-static-top">
   
      <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        
          

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="avatars/a.jpg" style="width:35px;height:35px;" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=admin_name_connected()?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="avatars/a.jpg"  class="img-circle" alt="User Image">

                <p>
                  <?=admin_name_connected()?>
                  <small>Administrador</small>
                </p>
              </li>

              <li class="user-footer"> 
                <div class="pull-right">
                  <a href="?p=logout" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="avatars/a.jpg" style="width:35px;height:35px;" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=admin_name_connected()?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        
        <li>
          <a href="./">
            <i class="fa fa-th"></i> <span>Principal</span>
          </a>
        </li>

        
        <li>
          <a href="./?p=agregar_producto">
            <i class="fa fa-th"></i> <span>Agregar Productos</span>
          </a>
        </li>
        
        <li>
          <a href="./?p=agregar_categoria">
            <i class="fa fa-th"></i> <span>Agregar Categoria</span>
          </a>
        </li>
        
        <li>
          <a href="./?p=manejar_tracking">
            <i class="fa fa-th"></i> <span>Manejar Tracking</span>
          </a>
        </li>
        
        <li>
          <a href="./?p=pagos">
            <i class="fa fa-th"></i> <span>Pagos</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 
  <div class="content-wrapper">
    <?php
    if(!isset($p)){
    ?>
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 0px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                <img src="dist/img/lol.jpg" alt="Usuario" class="online">
                <div class="attachment">
                  <h4>Attachments:</h4>
                  <p class="filename">
                   Theme-thumbnail-image.jpg
                  </p>
      <?php
    }else{
      ?>
      <div style="padding:30px;">
      <?php
      if(file_exists("modulos/".$p.".php")){
        include "modulos/".$p.".php";
      }else{
        echo "El modulo solicitado no existe";
      }
      ?>

      <?php
    }
    ?>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
