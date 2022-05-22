<?php
    // This file returns the database to run queries
    $host = "localhost"; 
    $username = "root";
    $password = "";
    $dbName = GetDbName();

    $dbConnection = mysqli_connect($host, $username, $password, $dbName);
    // Failed to connect to database
    if (!$dbConnection)
    {
        HeadTo("FailedToConnectToDB.php");
        exit();
    }
?>