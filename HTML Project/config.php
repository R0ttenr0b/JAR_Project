<?php


    $connString = "mysql:host=localhost; dbname=jar_inspections";
    $user="serveruser";
    $pass="serverpass";

    $pdo=new pdo($connString,$user,$pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//useful during initial development and debugging


