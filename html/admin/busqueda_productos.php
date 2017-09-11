

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Búsqueda de Productos - Bazar Borrego</title>

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
        <li class="open"><a href="busqueda_productos.php"><i></i> Búsqueda de Productos</a></li>
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
$page_title = 'Mostrar productos';
require ('../../mysqli_connect.php');
session_start();
if (!isset($_SESSION['id_usuario'])) {
  echo '';
  header("Location: ../login/login.php");
  exit();  

}
else{
  $q = "SELECT producto.id_producto, producto.nombre_producto, producto.marca, producto.estado, categoria.nombre_categoria, producto.descripcion, producto.precio FROM producto, categoria WHERE producto.ref_categoria = categoria.id_categoria AND fecha_pub BETWEEN NOW() - INTERVAL 30 DAY AND NOW() ORDER BY producto.nombre_producto ASC";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $b_nombre = $_POST['b_nombre'];
    $b_categoria = $_POST['b_categoria'];
    $b_marca = $_POST['b_marca'];
    $b_matricula = $_POST['b_matricula'];
    $b_estado = $_POST['b_estado'];
    $b_precio_min=1;
    $b_precio_max=100000;
    if(isset($_POST['b_precio_min'])){
      $b_precio_min = $_POST['b_precio_min'];
    }else{}
    if(isset($_POST['b_precio_max'])){
      $b_precio_max = $_POST['b_precio_max'];
    } else{}
    echo "$b_precio_max de chocolate y $b_precio_min de zarzamora";
    $q = "SELECT producto.id_producto, producto.nombre_producto, producto.marca, producto.estado, categoria.nombre_categoria, producto.descripcion, producto.precio, producto.estado  
    FROM producto, categoria, usuario WHERE producto.ref_categoria = categoria.id_categoria 
    AND producto.ref_usuario = usuario.id_usuario 
    AND producto.estado = '$b_estado' 
    AND producto.nombre_producto LIKE '%$b_nombre%' 
    AND categoria.nombre_categoria LIKE '%$b_categoria%' 
    AND producto.marca LIKE '%$b_marca%' 
    AND usuario.id_usuario LIKE '%$b_matricula%' 
    AND precio > '$b_precio_min' AND precio < '$b_precio_max' AND fecha_pub BETWEEN NOW() - INTERVAL 30 DAY AND NOW() 
    ORDER BY producto.nombre_producto ASC";
  }
}
?>
  						<h2 class="page-title">Búsqueda de Productos</h2>
  						<div class="row">
  							<div class="col-md-12">
  								<button data-toggle="collapse" data-target="#demo" class="btn btn-primary">Búsqueda Avanzada</button>
  								<br>
  								<div id="demo" class="collapse">
  									<div class="panel panel-default">
  										<div class="panel-heading">Búsqueda avanzada de productos</div>
  										<div class="panel-body">
  											<form method="post" action="busqueda_productos.php" class="form-horizontal">
  												<div class="form-group">
  													<label class="col-sm-2 control-label">Nombre</label>
  													<div class="col-sm-10">
  														<input name="b_nombre" type="text" class="form-control">
  													</div>
  												</div>
  												<div class="form-group">
  													<label class="col-sm-2 control-label">Marca o Autor</label>
  													<div class="col-sm-10">
  														<input name="b_marca" type="text" class="form-control">
  													</div>
  												</div>
  												<div class="hr-dashed"></div>
  												<div class="form-group">
  													<label class="col-sm-2 control-label">Categoría</label>
  													<div class="col-sm-10">
  														<input name="b_categoria" type="text" class="form-control">
  													</div>
  												</div>
  												<div class="form-group">
  													<label class="col-sm-2 control-label">
  														Estado
  														<br>
  													</label>
  													<div class="col-sm-10">
  														<div class="radio radio-info radio-inline">
  															<input type="radio" id="inlineRadio1" value="nuevo" name="b_estado" checked>
  															<label for="inlineRadio1"> Nuevo </label>
  														</div>
  														<div class="radio radio-inline">
  															<input type="radio" id="inlineRadio2" value="seminuevo" name="b_estado">
  															<label for="inlineRadio2"> Seminuevo </label>
  														</div>
  													</div>
  												</div>
  												<div class="hr-dashed"></div>
  												<div class="form-group">
  													<label class="col-sm-2 control-label">Matrícula</label>
  													<div class="col-sm-10">
  														<input name="b_matricula" type="text" class="form-control">
  													</div>
  												</div>
  												<div class="hr-dashed"></div>
  												<div class="form-group">
  													<label class="col-lg-2 control-label">Precio entre</label>
  													<div class="col-lg-10" id="rate_1">
  														<div class="input-group" id="datepicker">
  															<input name="b_precio_min" type="number" class=" form-control" value="1" required />
  															<span class="input-group-addon">- </span>
  															<input name="b_precio_max" type="number" class=" form-control" value="1000000" required />

  														</div>
  													</div>
  												</div>
  										<div class="hr-dashed"></div>
  										<div class="form-group">
  											<div class="col-sm-8 col-sm-offset-2">
  								  			<button class="btn btn-primary" type="submit">Buscar</button>
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
  							<div class="panel panel-default">
  								<div class="panel-heading">Productos</div>
  								<div class="panel-body">
  									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  										<thead>
  											<tr>
  												<th>Nombre</th>
  												<th>Marca/Autor</th>
  												<th>Categoría</th>
  												<th>Estado</th>
  												<th>Descripción</th>
  												<th>Precio</th>
  											</tr>
  										</thead>
  										<tfoot>
                        <tr>
                          <th>Nombre</th>
                          <th>Marca/Autor</th>
                          <th>Categoría</th>
                          <th>Estado</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                        </tr>
                      <tbody>
                        <?php
                         $r = mysqli_query ($dbc, $q);
                        while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

                          echo "\t<tr>
                          <td><a href=\"producto.php?pid={$row['id_producto']}\">{$row['nombre_producto']}</a></td>
                          <td>{$row['marca']}</td>
                          <td>{$row['nombre_categoria']}</td>
                          <td>{$row['estado']}</td>
                          <td>{$row['descripcion']}</td>
                          <td>\${$row['precio']}</td>
                          </tr>\n";
                      }

                          mysqli_close($dbc);
                        ?>
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

</body>

</html>