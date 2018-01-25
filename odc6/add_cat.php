<?php
	
	
	require_once('baza.php');
	
	
	if (isSet($_POST['name'])) {
		$id = isSet($_POST['id']) ? intval($_POST['id']) : 0;
		if ($id > 0) {
			// update row
			$sth = $pdo->prepare('UPDATE `category` SET `name`=:name WHERE id = :id');
			$sth->bindParam(':id', $_POST['id']);
		} else {
			// create a phantom query
			$sth = $pdo->prepare('INSERT INTO `category`(`name`) VALUES (:name)');
		}
		// data binding
		$sth->bindParam(':name', $_POST['name']);
	
		// execute the query
		$sth->execute();
		
		header('location: category.php');
	}
	
	// if $_GET['id'] exist: parse to int; else $id = 0;
	$idGet = isSet($_GET['id']) ? intval($_GET['id']) : 0;
		
	if ($idGet > 0) {
		// create a phantom query
		$sth = $pdo->prepare('SELECT * FROM `category` WHERE `id` = :id');
		// data binding
		$sth->bindParam(':id', $idGet);
		// execute the query
		$sth->execute();
		
		$result = $sth->fetch();
	}

?>

<form method="post" action="add_cat.php">

	<?php
	
	if ($idGet > 0) {
		echo '<input type="hidden" name="id" value="'.$idGet.'">';
	}
		
	?>

	Nazwa: <input type="text" name="name" <?php if (isSet($result['name'])) {echo 'value="'.$result['name'].'"';} ?> ><br><br>	
	<input type="submit" value="Zapisz">
</form>

<?php include('footer.php') ?>
