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

	<main>
		<section class="flipster">
			<ul>
				<li><img src="img/a-orillas-del-rio-piedra.jpg" alt="A Orillas del Rio Piedra"></li>
				<li><img src="img/aleph.jpg" alt="Aleph"></li>
			</ul>
		</section>
		
		<section id="manage-options">
			<ul class="menu-options">
				<li class="menu-option">
					<div class="menu-option-header">
						<i class="fa fa-bookmark"></i> | Autores
					</div>
					<div class="submenu-options">
						<ul>
							<li><i class="fa fa-book"></i> <a href="AddAuthors.php">Agregar autor</a></li>
							<li><i class="fa fa-book"></i> <a href="">Administrar autores</a></li>
						</ul>
					</div>
				</li>

				<li class="menu-option">
					<div class="menu-option-header">
						<i class="fa fa-bookmark"></i> | Editoriales
					</div>
					<div class="submenu-options">
						<ul>
							<li><i class="fa fa-book"></i> <a href="AddEditorials.php">Agregar Editorial</a></li>
							<li><i class="fa fa-book"></i> <a href="">Administrar Editoriales</a></li>
						</ul>
					</div>
				</li>

				<li class="menu-option">
					<div class="menu-option-header">
						<i class="fa fa-bookmark"></i> | Libros
					</div>
					<div class="submenu-options">
						<ul>
							<li><i class="fa fa-book"></i> <a href="AddBooks.php">Agregar Libro</a></li>
							<li><i class="fa fa-book"></i> <a href="ManageBooks.php">Administrar Libros</a></li>
						</ul>
					</div>
				</li>				
			</ul>			
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