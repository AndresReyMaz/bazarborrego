<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Agregar Departamento - Bazar Borrego</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>
  <body>
  	<?php include('include/userdropdown.html'); ?>

  	<div class="ts-main-content">
  		<nav class="ts-sidebar">
  			<ul class="ts-sidebar-menu">
          <li class="ts-label">Menú de opciones</li>
  				<li><a href="index.php"><i></i>Página Principal</a></li>
        <li><a href="busqueda_departamentos.php"><i></i>Búsqueda de Departamentos</a></li>
        <li><a href="busqueda_productos.php"><i></i> Búsqueda de Productos</a></li>
        <li class="open"><a href="agregar_departamentos.php"><i></i> Agregar Departamentos</a></li>
        <li><a href="agregar_productos.php"><i></i> Agregar Productos</a></li>
        <li><a href="mis_departamentos.php"><i></i> Ver Mis Departamentos</a></li>
        <li><a href="mis_productos.php"><i></i> Ver Mis Productos</a></li>

  				<!-- Account from above -->
  				<ul class="ts-profile-nav">
  					<li><a href="#">Help</a></li>
  					<li><a href="#">Settings</a></li>
  					<li class="ts-account">
  						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
  						<ul>
  							<li><a href="#">My Account</a></li>
  							<li><a href="#">Edit Account</a></li>
  							<li><a href="#">Logout</a></li>
  						</ul>
  					</li>
  				</ul>

  			</ul>
  		</nav>
  		<div class="content-wrapper">
  			<div class="container-fluid">

  				<div class="row">
  					<div class="col-md-12">
              <?php

require ('../../mysqli_connect.php');

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login/login.php");
    exit();  

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_us = $_SESSION['nombre'];
    $errors = array();
    $mat=$_SESSION['id_usuario'];

    if (empty($_POST['titulo'])) {
        $errors[] = 'Olvidaste introducir el titulo.';
    } else {
        $tit = mysqli_real_escape_string($dbc, trim($_POST['titulo']));
    }

    if (empty($_POST['direccion'])) {
        $errors[] = 'Olvidaste introducir una direccion.';
    } else {
        $ubi = mysqli_real_escape_string($dbc, trim($_POST['direccion']));
    }
    
    if (empty($_POST['precio'])) {
        $errors[] = 'Olvidaste introducir el precio de tu residencia.';
    } else {
        $prec= mysqli_real_escape_string($dbc, trim($_POST['precio']));
    }
    if (empty($_POST['venta_renta'])) {
        $errors[] = 'No seleccionaste la venta o renta de tu producto';
    } else {
        $vr = mysqli_real_escape_string($dbc, trim($_POST['venta_renta']));
    }
    if (empty($_POST['terreno'])) {
        $errors[] = 'No pusiste las dimensiones del terreno';
    } else {
        $terr = mysqli_real_escape_string($dbc, trim($_POST['terreno']));
    }
    if (empty($_POST['cuarto'])) {
        $errors[] = 'No pusiste el numero de cuartos';
    } else {
        $cua = mysqli_real_escape_string($dbc, trim($_POST['cuarto']));
    }
    if (empty($_POST['descripcion'])) {
        $errors[] = 'Escribe una breve descripcion de tu producto';
    } else {
        $desc = mysqli_real_escape_string($dbc, trim($_POST['descripcion']));
    }

    
    if (empty($errors)) {

        $q = "INSERT INTO residencia(titulo, ubicacion, precio, terreno, renta_venta, ref_usuario, cuarto, fecha_pub, descripcion) VALUES ('$tit','$ubi', '$prec', '$terr', '$vr', '$mat','$cua', now(), '$desc')";        
        $r = @mysqli_query ($dbc, $q);
        if ($r) {

        header('Location: departamento_agregado.php');
        exit();
        
        } else {
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        }
        
        mysqli_close($dbc);

        exit();
        
    } else {

        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';
        
    }


    
    mysqli_close($dbc);

}

?>
  						<h2 class="page-title">Añadir un departamento</h2>
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-default">
  									<div class="panel-heading">¡Ofrece un departamento!</div>
  									<div class="panel-body">
  										<form method="post" action="agregar_departamentos.php" class="form-horizontal">
  											<div class="form-group">
  												<label class="col-sm-2 control-label">Título</label>
  												<div class="col-sm-10">
  													<input name ="titulo" type="text" class="form-control" maxlength="140" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo'];?>">
  												</div>
  											</div>
  											<div class="form-group">
  												<label class="col-sm-2 control-label">Ubicación</label>
  												<div class="col-sm-10">
  													<input name="direccion" type="text" class="form-control" maxlength="200" value="<?php if(isset($_POST['direccion'])) echo $_POST['direccion'];?>">
  												</div>
  											</div>
  											<div class="hr-dashed"></div>
  											<div class="form-group">
  												<label class="col-sm-2 control-label">Precio</label>
  												<div class="col-sm-10">
  													<input name="precio" type="number" min = "0" class="form-control" value="<?php if(isset($_POST['precio'])) echo $_POST['precio'];?>">
  												</div>
  											</div>
  											<div class="form-group">
  												<label class="col-sm-2 control-label">
  													Renta/Venta
  													<br>
  												</label>
  												<div class="col-sm-10">
  													<div class="radio radio-info radio-inline">
  														<input type="radio" id="inlineRadio1" value="renta" name="venta_renta" checked>
  														<label for="inlineRadio1"> Renta </label>
  													</div>
  													<div class="radio radio-inline">
  														<input type="radio" id="inlineRadio2" value="venta" name="venta_renta">
  														<label for="inlineRadio2"> Venta </label>
  													</div>
  												</div>
  											</div>
  											<div class="hr-dashed"></div>
  											<div class="form-group">
  												<label class="col-sm-2 control-label">Terreno</label>
  												<div class="col-sm-10">
  													<input type="number" class="form-control" name="terreno" min = "0" max = "5000" value="<?php if(isset($_POST['terreno'])) echo $_POST['terreno'];?>">
  												</div>
  											</div>
  											<div class="form-group">
  												<label class="col-sm-2 control-label">Cuartos</label>
  												<div class="col-sm-10">
  													<input type="number" class="form-control" name="cuarto" min = "0" max = "99" value="<?php if(isset($_POST['cuarto'])) echo $_POST['cuarto'];?>">
  												</div>
  											</div>
			 									<div class="form-group">
													<label class="col-sm-2 control-label">Descripción</label>
													<div class="col-sm-10">
														<textarea class="form-control" name="descripcion" rows="3" maxlength = "1500"><?php if(isset($_POST['descripcion'])) echo $_POST['descripcion'];?></textarea>
													</div>
												</div>
  													<br>
  													<div class="col-sm-8 col-sm-offset-2">
  														<center>
  															<button class="btn btn-primary" type="submit">Agregar</button>
  														</center>
  													</div>
  												</form>
  												<br>
  											</div>
  										</div>
  									</div>
  									<br>
  								</div>
  								<br>
  								<br>

  							</div>
  						</div>
  					</div>

  				</div>

  			</div>
  		</div>
  	</div>
  </div>
</div>

<!-- Loading Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>

</body>

</html>