<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">
  
  <title>Departamento - Bazar Borrego</title>

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
<?php
    echo '
  <body>';
    include('include/userdropdown.html');
    echo '<div class="ts-main-content">
      <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">
          <li class="ts-label">Menú de opciones</li>
          <li><a href="index.php"><i></i>Página Principal</a></li>
        <li><a href="busqueda_departamentos.php"><i></i>Búsqueda de Departamentos</a></li>
        <li><a href="busqueda_productos.php"><i></i> Búsqueda de Productos</a></li>
        <li><a href="agregar_departamentos.php"><i></i> Agregar Departamentos</a></li>
        <li><a href="agregar_productos.php"><i></i> Agregar Productos</a></li>
        <li class="open"><a href="mis_departamentos.php"><i></i> Ver Mis Departamentos</a></li>
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

              echo 'Departamento Eliminado!<br><form action = "mis_departamentos.php"><button type = "submit">Regresar a mis departamentos</button></form>';
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
?>

  			
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