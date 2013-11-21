<!doctype html>

<html lang="es">
<head>
	<title>Bookstore</title>
	<meta charset="utf-8">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<!-- Flipster CSS -->
	<link rel="stylesheet" href="libs/flipster/css/jquery.flipster.min.css">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$link = new mysqli("localhost", "root", "computacion1.", "bookstore");

			if (mysqli_connect_errno()) {
				echo "<p>falló</p>";
			}
			$query = 'INSERT INTO editorial (name_editorial, address) VALUES ("'.$_POST['editorial_name'].'","'.$_POST['editorial_address'].'");';
			$result = $link->query($query);
			$link->close();
		}
	?>

	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
		   <a class="navbar-brand" href="index.php">Bookstore</a>
		</div>

		<div class="collapse navbar-collapse" id="main-navbar">
			<ul class="nav navbar-nav">
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Compañía</a></li>
				<li><a href="#">Contáctenos</a></li>
			</ul>
		</div>
	</nav>

	<main class="col-sm-8 col-sm-offset-2">
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($result) {
					echo '<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  <strong>Éxito!</strong> la editorial ha sido añadido. 
					      </div>';
				} else {
					echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  <strong>Error</strong> ha ocurrido un problema. 
					      </div>';
				}
			}
		?>

		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text alpha-space-only" class="form-control alpha-space-only" id="input-name" name="editorial_name" placeholder="Planeta" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Dirección</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="editorial_address" placeholder="Mexico, D. F."></textarea>
				</div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>
		  	</div>
		</form>
	</main>

	<!-- JQuery -->
	<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	<!-- Flipster -->
	<script src="libs/flipster/js/jquery.flipster.min.js"></script>
	<!-- Main Script -->
	<script src="js/bookstore.js"></script>
</body>
</html>