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
			<h2>Login</h2>
			<form action="authentucate.php" method="post" id="login">
				Username: <input type="text" name="username"><br>
				Passerword: <input type="password" name="password"><br>
				<input type="submit" form="login" value="login">
			</form>
		</article>
		<?php include("footer.inc"); ?>
	</div>
</body>
</html>