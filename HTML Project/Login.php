<?php 
    if (empty($_POST['username'])||empty($_POST['password']))
        exit ("<p>All fields must be filled in, press back to continue.</p>");

    require_once("config.php");

    $username = $_POST['username'];
    $password = hash('sha256', htmlentities($_POST['password']));
    
    //Connects to database
    require_once("config.php");

    $table = "jar_users";


    $sql = "SELECT * FROM $table 
            WHERE username = '$username' 
            AND password = '$password'";
    $result = $pdo->query($sql);
    
    echo "<pre>$sql<pre>";

    if(!($row = $result->fetch()))
        exit("Invalid email or password</p>");
    else {
        print_r($row);
    }

    $pdo = null;
?>