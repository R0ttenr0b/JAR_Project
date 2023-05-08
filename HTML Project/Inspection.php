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

    $sql = "INSERT INTO $table VALUES(NULL, '$fname', '$lname', '$email', '$phone', '$addr', '$city', '$zip', '$date')";
    $result = $pdo->query($sql);

    if(!($row = $result->fetch()))
        exit("Missing input</p>");
    else {
        print_r($row);
    }

    $pdo = null;
?>