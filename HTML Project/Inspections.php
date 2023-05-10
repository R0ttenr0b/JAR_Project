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
      .contact-form {
    margin: 50px auto;
    max-width: 700px; /* Increased width */
    padding: 50px; /* Increased padding */
    background-color: rgba(230, 230, 230, 0.8);
    border-top-left-radius: 50% 20%;
    border-top-right-radius: 50% 20%;
    border-bottom-left-radius: 20% 50%;
    border-bottom-right-radius: 20% 50%;
	}

        .form-label {
            font-size: 1.1rem;
            margin-bottom: 10px;
            font-weight: bold;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            box-shadow: 0px 1px 3px rgba(0,0,0,0.1) inset;
        }
        .submit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            margin-top: 10px;
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
        table { border-collapse: collapse; margin:auto;
        }
        table, td,th {border: thin solid black;padding:5px;}
        .submit_button {
            background-color:#4CAF50;
            color:white;
            width:150px;
            text-align:center;
            border-radius:10px;
            border-width:0px;
            display:inline-block;
        }
        .subnit_button:hover {
            background-color:#3e8e41;
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
	<div class="container">
		<form action="#" method="get">
		<table>
			<tr>
				<th>Mark Finished</th>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th>City</th>
				<th>Zip</th>
				<th>Date</th>
				<th>Fulfilled</th>
			</tr>
		<?php
			require_once("config.php");

			$table = "jar_inspections";


			if(!empty($_GET)) {
				foreach($_GET as $value) {
					$sql = "UPDATE $table SET `fulfilled` = 1 WHERE `inspectionID` = $value";
					//UPDATE `jar_inspections` SET fulfilled = 1 WHERE inspectionID = 2;
					$result = $pdo->exec($sql);
				}
			}
			//SELECT * FROM `jar_inspections` WHERE `fulfilled` = 1
			$sql = "SELECT * FROM $table WHERE `fulfilled` = 0";

			$result = $pdo->query($sql);

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td><input type='checkbox' value='". $row['inspectionID'] . "' name='".$row['inspectionID']."'></td>";
				foreach($row as $value) {
					echo "<td>".$value."</td>";
				}
				echo "</tr>";
			}
			$pdo = null;
		?>
		</table>
		<br>
		<input type="submit" value="Make Changes" class="submit_button">
		</form>
	</div>
</body>
</html>
