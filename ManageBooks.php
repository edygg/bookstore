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
		$link = new mysqli("localhost", "root", "computacion1.", "bookstore");

		if (mysqli_connect_errno()) {
			echo "<p>falló</p>";
		}

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			//Eliminar
			$deleted = false;
			$result1 = $link->query("DELETE FROM book WHERE id_book = ".$_GET['id']);
			$result2 = $link->query("DELETE FROM bookauthors WHERE id_book = ".$_GET['id']);
			if ($result1 && $result2) {
				$deleted = true;
			}
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
		<section class="table-responsive">
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
					if ($deleted) {
						echo '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  <strong>Éxito!</strong> el libro ha sido eliminado. 
						      </div>';
					} else {
						echo '<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  <strong>Error</strong> ha ocurrido un problema. 
						      </div>';
					}
				}
			?>

			<table class="table table-hover">
				<thead>
					<th>ISBN</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php 
					$result = $link->query("SELECT id_book, isbn, namebook FROM book ORDER BY namebook;");
					while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
						echo '<tr>';
						echo '<td>'.$row['isbn'].'</td>';
						echo '<td>'.$row['namebook'].'</td>';
						echo '<td>
							  <button type="button" class="btn btn-primary btn-sm"><a href="UpdateBooks.php?id='.$row['id_book'].'">Actualizar</a></button>
							  <button type="button" class="btn btn-danger btn-sm"><a href="ManageBooks.php?id='.$row['id_book'].'">Eliminar</a></button>
							  </td>';
						echo '</tr>';
					}
					$link->close();
				?>
				</tbody>
			</table>
		</section>
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