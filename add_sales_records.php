<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Peoples Health Pharmarcy</title>
	<meta name="description" content="Peoples Health Pharmarcy Website" />
	<meta name="keywords"    content="Peoples Health Pharmarcy" />
	<meta name="author"      content="Glory to the BlueBeard" />
	<link href="styles/page_style.css" rel="stylesheet" />
</head>
<body>
	<?php include("header.inc"); ?>
	<div id="main">
		<article>
			<h2>Add sales records</h2>
			<form action="welcome_get.php" method="post" id="add record">
				Item: <input type="text" name="item"><br>
				Quantity: <input type="text" name="quantity"><br>
				<input type="submit" form="add record" value="Add Record">
			</form>
		</article>
		<?php include("footer.inc"); ?>
	</div>
</body>
</html>