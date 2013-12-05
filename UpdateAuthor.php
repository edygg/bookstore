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
		include 'DbConnector.php';

		$db = new DbConnector();

		if ($db->error()) {
			echo "<p>falló</p>";
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$query = 'UPDATE author SET name_author="'.$_POST['author_name'].'", nationality="'.$_POST['author_nationality'].'" WHERE id_author='.$_GET['id'].';';
			$result = $db->link->query($query);
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
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
			<?php if ($result): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  	<strong>Éxito!</strong> el autor ha sido añadido. 
		      </div>
			<?php else: ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  	<strong>Error</strong> ha ocurrido un problema. 
		      	</div>
			<?php endif; ?>
		<?php endif; ?>

		<form class="form-horizontal" method="post">
			<?php 
				if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']) {
					$result = $db->link->query("SELECT name_author, nationality FROM author WHERE id_author=".$_GET['id'].";");
					$row = $result->fetch_array(MYSQLI_ASSOC);
				}
			?>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" 
						   id="input-name" name="author_name" 
						   placeholder="Paulo Coelho" required
						   data-validation="custom" data-validation-regexp="^([a-zA-zñÑáéíóúÁÉÍÓÚ ]+)$"
						   value=<?php echo '"'.$row['name_author'].'"'; ?>>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Nacionalidad</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" 
						   id="input-nationality" name="author_nationality" 
						   placeholder="Brasileño" required
						   data-validation="custom" data-validation-regexp="^([a-zA-zñÑáéíóúÁÉÍÓÚ]+)$"
						   value=<?php echo '"'.$row['nationality'].'"'; ?>>
				</div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Actualizar</button>
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
	<!-- Form Validator -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.27/jquery.form-validator.min.js"></script>
	<!-- Main Script -->
	<script src="js/bookstore.js"></script>
</body>
</html>