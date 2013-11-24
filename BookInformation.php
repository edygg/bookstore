<?php 
	include 'DbConnector.php';

	$db = new DbConnector();

	if ($db->error()) {
		echo "<p>falló</p>";
	}
?>

<?php 
	$result = $db->link->query("SELECT B.isbn, B.year, E.name_editorial, A.name_author ".
							"FROM book B JOIN editorial E ON B.id_editorial = E.id_editorial 
										 JOIN bookauthors BA ON B.id_book = BA.id_book 
										 JOIN author A ON BA.id_author = A.id_author 
							 WHERE B.id_book = ".$_GET['idbook'].";");
	$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<div>
<ul>
	<li><strong>ISBN: </strong> <?php echo $row['isbn']; ?></li>
	<li><strong>Año: </strong> <?php echo $row['year']; ?></li>
	<li><strong>Editorial: </strong> <?php echo $row['name_editorial']; ?></li>
	<li><strong>Autor(es): </strong> 
		<?php 
			do {
				echo $row['name_author'];

				if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo ", ";
				} 
			} while ($row); 
		?>
	</li>
</ul>
</div>