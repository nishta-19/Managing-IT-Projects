<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Peoples Health Pharmarcy</title>
	<meta name="description" content="Peoples Health Pharmarcy Website" />
	<meta name="keywords"    content="Peoples Health Pharmarcy" />
	<meta name="author"      content="Glory of the Blue Beard" />
	<link href="styles/assignment2.css" rel="stylesheet" />
</head>
<body>
	<?php include("header.inc"); ?>
	<div id="main">
		<article>
			<h2>Add sales records</h2>
			<form action="welcome_get.php" method="get">
				Item: <input type="text" name="item"><br>
				Quantity: <input type="text" name="quantity"><br>
				<input type="submit">
			</form>
		</article>
		<?php include("footer.inc"); ?>
	</div>
</body>
</html>