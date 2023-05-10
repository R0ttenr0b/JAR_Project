<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Scheduled Inspections</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<style>
		body {
			background: #255C55;
			color: #444;
			font-family: "Open Sans", sans-serif;
			line-height: 1.6;
			margin: 0;
			padding: 0;
		}
		
		.navbar-collapse {
			flex-grow: unset !important;
		}
		.nav-link {
			color: #222;
		}
		.main {
			margin:auto;
			width:60%;
			padding:10px;
            text-align:center;
		}
		.main h1 {
			color: white;
			text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
			font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
		}
		.main ul {
			color: white;
			text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
		}
        .container {
            border:solid thin #222;
            width:85%;
            margin:auto;
            margin-top: 30px;
            background-color:whitesmoke;
            text-align:center;
			border-radius:10px;
			padding:20px;
			margin:auto;
            text-align:center;
        }
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a href="JAR_project.html"><img height="50" style="border-radius:30px;" src="https://cdn.discordapp.com/attachments/1008571069797507102/1088568757879836692/RottenRob_A_minimalistic_and_elite_brand_logo_for_a_restaurant__200dcb2f-f0bd-4469-a5d3-603ebd0b7fea.png"></a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="JAR_project.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Services.html">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="About Us.html">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Contact.html">Contact</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="Inspection.html">Schedule Inspection</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Login.html">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Signup.html">Sign Up</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
<?php
//check the user input first
if (empty($_POST['email']) || empty($_POST['email2']) || empty($_POST["username"]) || empty($_POST['password']) || empty($_POST['password2']))
    exit ("<p>Required fields empty</p>");

else if ($_POST["email"] != $_POST["email2"])
    exit ("<p>Email addresses do not match</p>");

else if ($_POST["password"] != $_POST["password2"])
    exit ("<p>Passwords do not match</p>");


//connecting to the database with PDO
require_once("config.php");

$table = "jar_users";
$email = htmlentities($_POST['email']);
$username = htmlentities($_POST['username']);

$sql = "SELECT * FROM $table where email = '$email' or username = '$username'";
$result = $pdo->query($sql);

if($result->fetch()) {
    exit("An account with that username or email already exists.");
}

$password = hash('sha256',htmlentities($_POST['password']));

//Insert user into table
$sql = "INSERT INTO $table VALUES (NULL, '$username','$email','$password')";

$pdo->exec($sql);

echo("<p class='container'>Account successfully created go to <a href='Login.html'>Login</a></p>");
$pdo = null;
?>
</body>
</html>