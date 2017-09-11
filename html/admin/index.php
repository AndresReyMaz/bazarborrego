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
	$mat = $_SESSION['id_usuario'];
	$nom_us = $_SESSION['nombre'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	}
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Página Principal - Bazar Borrego</title>

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
				<li class="open"><a href="index.php"><i></i>Página Principal</a></li>
				<li><a href="busqueda_departamentos.php"><i></i>Búsqueda de Departamentos</a></li>
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

						<h2 class="page-title">Bienvenido, <?php echo "$nom_us";?>.</h2>
						<h3>Estos son solo algunos ejemplos de lo que Bazar Borrego puede hacer por ti: </h3>
						<br>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">4</div>
													<div class="stat-panel-title text-uppercase">Celulares en nuestra base</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer">Mostrar <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">2</div>
													<div class="stat-panel-title text-uppercase">DEPARTAMENTOS EN TU ZONA</div>
												</div>
											</div>
											<a href="busqueda_departamentos.php" class="block-anchor panel-footer text-center">Mostrar &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">1</div>
													<div class="stat-panel-title text-uppercase">Libro de química EN VENTA</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center">Mostrar &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">3</div>
													<div class="stat-panel-title text-uppercase">Smartwatches EN REBAJA</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center">MOSTRAR &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Notificación</div>
									<div class="panel-body">
										<div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
											<strong>Estos son nuestros usuarios más activos:</strong><a href="#" class="alert-link"></a>
										</div>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Matrícula</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>Andrés</td>
													<td>Reynoso</td>
													<td>A01321452</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>Jorge</td>
													<td>Beauregard</td>
													<td>A01325588</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>Ricardo</td>
													<td>Legaspi</td>
													<td>A01325891</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Mejores categorías</div>
									<div class="panel-body">
										<div class="alert alert-dismissible alert-info">
											<button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
											<strong>Estas son las categorías más buscadas:</strong> <a href="#" class="alert-link"></a>
										</div>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Categoría</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>Celulares</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>Libros</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>Departamentos</td>
												</tr>
												<tr>
													<th scope="row">4</th>
													<td>Ropa</td>
												</tr>
												<tr>
													<th scope="row">5</th>
													<td>Audífonos</td>
												</tr>
											</tbody>
										</table>
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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>