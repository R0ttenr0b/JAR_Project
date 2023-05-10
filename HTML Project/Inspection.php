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
    if (empty($_POST['fname'])||empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['phone'] || empty($_POST['addr']) || empty($_POST['city']) || empty([$_POST['zip']]) || empty([$_POST['date']])))
        exit ("<p>All fields are required.</p>");

    require_once("config.php");

    
    //Connects to database
    require_once("config.php");

    $table = "jar_inspections";
    $fname = htmlentities($_POST['fname']);
    $lname = htmlentities($_POST['lname']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $addr = htmlentities($_POST['addr']);
    $city = htmlentities($_POST['city']);
    $zip = htmlentities($_POST['zip']);
    $date = htmlentities($_POST['date']);

    $sql = "INSERT INTO $table VALUES(NULL, '$fname', '$lname', '$email', '$phone', '$addr', '$city', '$zip', '$date', 0)";
    $result = $pdo->query($sql);
    
    $pdo = null;

    echo "<p class='container'>Thank you for your time</p>"
?>
</body>
<html>