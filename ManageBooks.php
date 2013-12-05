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

		if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']) {
			//Eliminar
			$deleted = false;
			$result1 = $db->link->query("DELETE FROM book WHERE id_book = ".$_GET['id']);
			$result2 = $db->link->query("DELETE FROM bookauthors WHERE id_book = ".$_GET['id']);
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
		<section>
			<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']): ?>
				<?php if ($deleted): ?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 	<strong>Éxito!</strong> el libro ha sido eliminado. 
			      	</div>
				<?php else: ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Error</strong> ha ocurrido un problema. 
					</div>
				<?php endif; ?>
			<?php endif; ?>	
 							
			<?php $result = $db->link->query("SELECT B.id_book, B.namebook, B.isbn, B.year, E.name_editorial ".
											"FROM book B JOIN editorial E ON B.id_editorial = E.id_editorial;"); 
			?>
			<?php if ($result->num_rows == 0): ?>
				<div class="alert alert-warning">
					<p><strong>No hay libros que mostrar.</strong></p>
				</div>
			<?php else: ?>
				<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
					<article class="book" data-idbook=<?php echo '"'.$row['id_book'].'"'; ?> >
						<header>
							<div>
								<?php echo $row['namebook']; ?>
							</div>
						</header>
						<div class="book-details">
							<div class="manage-book-options">
								<button type="button" class="btn btn-primary"><a href="#">Actualizar</a></button>
								<button type="button" class="btn btn-danger"><a href=<?php echo '"ManageBooks.php?id='.$row['id_book'].'"'; ?>>Eliminar</a></button>
							</div>
							<ul>
								<li><strong>ISBN: </strong> <?php echo $row['isbn']; ?></li>
								<li><strong>Año: </strong> <?php echo $row['year']; ?></li>
								<li><strong>Editorial: </strong> <?php echo $row['name_editorial']; ?></li>
								<li><strong>Autor(es): </strong> 
									<?php $result2 = $db->link->query("SELECT A.name_author 
																	  FROM author A JOIN bookauthors BA ON A.id_author = BA.id_author 
																	  WHERE BA.id_book = ".$row['id_book'].";"); ?>

									<?php 
										$row = $result2->fetch_array(MYSQLI_ASSOC);
										do {
											echo $row['name_author'];

											if ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
												echo ", ";
											} else {
												break;
											}
										} while (true); 
									?>
								</li>
							</ul>
						</div>
					</article> 
				<?php endwhile; ?>
			<?php endif; ?>
		</section>
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