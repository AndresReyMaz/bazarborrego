<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Búsqueda de Departamentos - Bazar Borrego</title>

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
				<li class="open"><a href="busqueda_departamentos.php"><i></i>Búsqueda de Departamentos</a></li>
				<li><a href="busqueda_productos.php"><i></i> Búsqueda de Productos</a></li>
				<li><a href="agregar_departamentos.php"><i></i> Agregar Departamentos</a></li>
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
$page_title = 'Mostrar departamentos';
require ('../../mysqli_connect.php');
session_start();
if (!isset($_SESSION['id_usuario'])) {
  echo '';
  header("Location: ../login/login.php");
  exit();  

}
else{
	$q = "SELECT id_residencia, titulo, ubicacion, renta_venta, precio, terreno, cuarto FROM residencia,usuario WHERE residencia.ref_usuario = usuario.id_usuario AND fecha_pub BETWEEN NOW() - INTERVAL 30 DAY AND NOW() ORDER BY fecha_pub DESC";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$b_titulo = $_POST['b_titulo'];
		$b_ubicacion = $_POST['b_ubicacion'];
		$b_matricula = $_POST['b_matricula'];
		$b_vr = $_POST['b_vr'];
		
		if(isset($_POST['b_precio_min']))
			$b_precio_min = $_POST['b_precio_min'];
		else $b_precio_min=1;
		if(isset($_POST['b_precio_max']))
			$b_precio_max = $_POST['b_precio_max'];
		else $b_precio_max=10000000;
			if(isset($_POST['b_terr_min']))
			$b_terr_min = $_POST['b_terr_min'];
		else $b_terr_min=1;
		if(isset($_POST['b_terr_max']))
			$b_terr_max = $_POST['b_terr_max'];
		else $b_terr_max=10000000;
		$q = "SELECT id_residencia, titulo, ubicacion, renta_venta, precio, terreno, cuarto FROM residencia, usuario WHERE residencia.ref_usuario = usuario.id_usuario 
		AND titulo LIKE '%$b_titulo%' 
		AND ubicacion LIKE '%$b_ubicacion%' 
		AND usuario.id_usuario LIKE '%$b_matricula%' 
		AND renta_venta = '$b_vr' 
		AND terreno BETWEEN '$b_terr_min' AND '$b_terr_max' 
		AND precio BETWEEN '$b_precio_min' AND '$b_precio_max' AND fecha_pub BETWEEN NOW() - INTERVAL 30 DAY AND NOW() 
		ORDER BY fecha_pub DESC";
	}
}
?>
						<h2 class="page-title">Búsqueda de Departamento</h2>
						<button data-toggle="collapse" data-target="#demo" class="btn btn-primary">Búsqueda Avanzada</button>
  						<br>
  								<div id="demo" class="collapse">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Búsqueda avanzada de departamentos</div>
									<div class="panel-body">
										<form method="post" action="busqueda_departamentos.php" class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-2 control-label">Título</label>
												<div class="col-sm-10">
													<input name="b_titulo" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Ubicación</label>
												<div class="col-sm-10">
													<input name="b_ubicacion" type="text" class="form-control">
												</div>
											</div>
								
											<div class="form-group">
												<label class="col-sm-2 control-label">
												Renta/Venta
													<br>
												</label>
												<div class="col-sm-10">
													<div class="radio radio-info radio-inline">
														<input type="radio" id="inlineRadio1" value="renta" name="b_vr" checked>
														<label for="inlineRadio1"> Renta </label>
													</div>
													<div class="radio radio-inline">
														<input type="radio" id="inlineRadio2" value="venta" name="b_vr">
														<label for="inlineRadio2"> Venta </label>
													</div>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Matrícula</label>
												<div class="col-sm-10">
													<input name="b_matricula" type="text" class="form-control" name="password">
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-lg-2 control-label">Precio entre</label>
												<div class="col-lg-10" id="rate_1">
													<div class="input-group" id="datepicker">
														<input name="b_precio_min" type="number" class=" form-control" value="1" required />
														<span class="input-group-addon">- </span>
														<input name="b_precio_max" type="number" class=" form-control" name="end" value="1000000000" required />
													</div>

												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-lg-2 control-label">Terreno entre (m^2)</label>
												<div class="col-lg-10" id="rate_1">
													<div class="input-group" id="datepicker">
														<input name="b_terr_min" type="number" class=" form-control" value="1" required />
														<span class="input-group-addon">- </span>
														<input name="b_terr_max" type="number" class=" form-control" value="10000" required />
													</div>												
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-primary" type="submit">Buscar</button>
												</div>
											</div>
											</div>
											</form>
											</div>
											</div>
											</div>
											</div>
										
							<br>
							<br>

							<div class="panel panel-default">
							<div class="panel-heading">Departamentos</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Título</th>
											<th>Ubicación</th>
											<th>Renta/Venta</th>
											<th>Precio</th>
											<th>Terreno</th>
										</tr>
									</thead>

									<tfoot>
										<tr>
											<th>Título</th>
											<th>Ubicación</th>
											<th>Renta/Venta</th>
											<th>Precio</th>
											<th>Terreno</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
										$r = mysqli_query ($dbc, $q);
										while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

											echo "\t<tr>

											<td><a href=\"departamento.php?pid={$row['id_residencia']}\">{$row['titulo']}</a></td>
											<td>{$row['ubicacion']}</td>
											<td>{$row['renta_venta']}</td>
											<td>\${$row['precio']}</td>
											<td>{$row['terreno']}</td>
											</tr>\n";

										} 
										?>
									</tbody>

								</table>
											

										</form>

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