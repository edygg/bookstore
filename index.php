<!doctype html>

<html lang="es">
<head>
	<title>Bookstore</title>
	<meta charset="utf-8">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/flipster/css/jquery.flipster.min.css">
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

		<section>
		</section>
	</main>
	<!-- JQuery -->
	<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	<!-- Flipster -->
	<script src="libs/flipster/js/jquery.flipster.min.js"></script>
	<!-- Script -->
	<script src="js/bookstore.js"></script>
</body>
</html>