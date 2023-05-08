
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

exit("<p>Account successfully created go to <a href='Login.html'>Login</a></p>");
$pdo = null;
?>