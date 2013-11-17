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

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$query = 'INSERT INTO book (isbn, namebook, year, id_editorial) 
					  VALUES ("'.$_POST['book_isbn'].'","'.$_POST['book_name'].'",'.$_POST['book_year'].','.$_POST['book_editorial'].');';
			$result = $link->query($query);
		}

		if ($result) {
			$id_book = $link->insert_id;
			foreach ($_POST['book_authors'] as $author) {
				$query = 'INSERT INTO bookauthors VALUES ('.$id_book.','.$author.');';
				$link->query($query);
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
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($result) {
					echo '<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  <strong>Éxito!</strong> el autor ha sido añadido. 
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
				<label class="col-sm-2 control-label">ISBN</label>
				<div class="col-sm-10">
					<input type="text" class="form-control isbn-chek" id="input-isbn" name="book_isbn" placeholder="9783161484100" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control alpha-space-only" id="input-name" name="book_name" placeholder="Aleph" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Año</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="input-year" name="book_year" placeholder="1998" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Editorial</label>
				<div class="col-sm-10">
					<select class="form-control" name="book_editorial">
					<?php
						$result = $link->query("SELECT id_editorial, name_editorial FROM editorial");
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
							echo '<option value="'.$row['id_editorial'].'">'.$row['name_editorial']."</option>";
						}
					?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Autor (es)</label>
				<div class="col-sm-10">
					<select class="form-control" name="book_authors[]" multiple>
					<?php
						$result = $link->query("SELECT id_author, name_author FROM author");
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
							echo '<option value="'.$row['id_author'].'">'.$row['name_author']."</option>";
						}
						$link->close();
					?>
					</select>
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