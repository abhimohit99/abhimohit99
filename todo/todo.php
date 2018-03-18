<?php

require_once 'initialise.php';

$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user
");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

foreach($items as $item) {
	echo $item['name'], '<br>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My To-do List</title>
	<link href="https://fonts.googleapis.com/css?family=Mina" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0>
</head>
<body>
	<h1 class="header">What to do?</h1>
	<div class="list">
		<h2 class="header"> Here's what's left: </h2>
		<ul class="things">
			<li><span class="thing">Visit Europe</span>
				<a href="#" class=doneButton>Done</a>
			</li>
			<li><span class="thing done">Go to Canada</span>
			</li>
		</ul>
		<form class="addThing" action="add.php" method="post">
			<input type="text" name="itemName" placeholder="Add things here!" class="input" autocomplete="off" required>
			<input type="submit" value="Let's do it!" class="submitButton">
	</form>
	</div>
</body>
</html>
