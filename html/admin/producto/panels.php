<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Harmony - Free responsive Bootstrap admin template by Themestruck.com</title>

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

</head>
<?php
$row = FALSE; // Assume nothing!

if (isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) { // Make sure there's a print ID!

  $pid = $_GET['pid'];
  
  // Get the print info:
  require ('../../../mysqli_connect.php'); // Connect to the database.
  $q = "SELECT producto.id_producto, producto.nombre_producto, producto.marca, producto.estado, categoria.nombre_categoria, producto.descripcion, producto.precio, usuario.nombre, usuario.apellido, email FROM producto, categoria, usuario WHERE producto.ref_categoria = categoria.id_categoria AND producto.id_producto = $pid AND id_usuario = ref_usuario ORDER BY producto.nombre_producto ASC";
  
  $r = mysqli_query ($dbc, $q);
  if (mysqli_num_rows($r) == 1) { // Good to go!
    echo '
  <body>';
    include('include/userdropdown.html');
    echo '<div class="ts-main-content">
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

          <div class="row">';

    // Fetch the information:
    $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
  
    // Start the HTML page:
    $page_title = $row['nombre_producto'];
  
    // Display a header:
    echo "<div align=\"center\">
    <b>{$row['nombre_producto']}</b> by 
    {$row['marca']}<br />";

    // Print the size or a default message:

    echo "<br />Precio: \${$row['precio']} 
    </div><br />";
  
    // Get the image information and display the image:
    /*if ($image = @getimagesize ("../uploads/$pid")) {
      echo "<div align=\"center\"><img src=\"show_image.php?image=$pid&name=" . urlencode($row['image_name']) . "\" $image[3] alt=\"{$row['print_name']}\" /></div>\n"; 
    } else {
      echo "<div align=\"center\">No image available.</div>\n"; 
    }*/
    
    // Add the description or a default message:
    echo '<p align="center">' . ((is_null($row['descripcion'])) ? '(No description available)' : 'Descripcion: ' . $row['descripcion']) . '</p>';
    // Usuario

    echo "Contacto: {$row['nombre']} {$row['apellido']} <br /> Correo: {$row['email']}";
    echo '</div>
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

</html>';
  } // End of the mysqli_num_rows() IF.
  
  mysqli_close($dbc);

} // End of $_GET['pid'] IF.

if (!$row) { // Show an error message.
  $page_title = 'Error';
  echo '<div align="center">This page has been accessed in error!</div>';
}

?>
<body>
  	<div class="brand clearfix">
  		<a href="index.html" class="logo"></a>
  		<span class="menu-btn"><i class="fa fa-bars"></i></span>
  		<ul class="ts-profile-nav">
  			<li class="ts-account">
  				<a href="#"><class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
  				<ul>
  					<li><a href="#">Logout</a></li>
  				</ul>
  			</li>
  		</ul>
  	</div>


	<div class="ts-main-content">
  		<nav class="ts-sidebar">
  			<ul class="ts-sidebar-menu">
  				<li class="ts-label">Menú de opciones</li>
  				<li ><a href="index.html"><i></i>Página Principal</a></li>
  				<li><a href="tables.html"><i></i>Búsqueda de Departamentos</a></li>
  				<li class="open"><a href="forms.html"><i></i> Búsqueda de Productos</a></li>
  				<li><a href="charts.html"><i></i> Agregar Departamentos</a></li>
				<li><a href="prod.html"><i></i> Agregar Productos</a></li>

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

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/1100X400" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo "\${$row['precio']}";?></h4>
                        <h4><a href="#">Nombre del producto</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>

                <div class="well">
                    <hr>

                </div>

            </div>
				</div>

				<div class="row">
					<div class="clearfix pt pb">
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
