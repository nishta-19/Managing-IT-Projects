<!DOCTYPE html>

<?php
//https://codeshack.io/secure-login-system-php-mysql/
    session_start();

    // check if the user is already logged in 
    if(isset($_SESSION["loggedin"])){
        header("location: display_sales_records.php");
        exit;
    }

    require_once "config.php";

    $login_err = "";

    // process data only when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Try and connect using the info above.
        $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        if ( mysqli_connect_errno() ) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }

        // Now we check if the data from the login form was submitted, isset() will check if the data exists.
        if (!isset($_POST['username'], $_POST['password']) ) {
            // Could not get the data that should have been sent.

            exit('Please fill both the username and password fields!');
        }
        
        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
        if ($stmt = $con->prepare('SELECT UserID, password FROM user WHERE Username = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();

            

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $password);
                $stmt->fetch();
                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.
                if (!strcmp($_POST['password'], $password)) {
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['username'];
                    $_SESSION['id'] = $id;

                    header("location: display_sales_records.php");
                    
                } else {
                    // Incorrect password
                    $login_err = 'Incorrect username and/or password!';
                }
            } else {
                // Incorrect username
                $login_err = 'Incorrect username and/or password!';
            }

            $stmt->close();
        }
    }
?>

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
    <header>
        <h1>Peoples Health Pharmacy</h1>
    </header>
	<div id="main">
		<article>
			<h2>Login</h2>
			<?php 
				if(!empty($login_err)){
					echo '<p>' . $login_err . '</p>';
				}        
			?>

			<form action="login.php" method="post">
				Username: <input type="text" name="username" placeholder="Username" id="username"><br>
				Passerword: <input type="password" name="password" placeholder="Password" id="password"><br>
				<input type="submit" value="login">
			</form>
		</article>
		<?php include("footer.inc"); ?>
	</div>
</body>
</html>