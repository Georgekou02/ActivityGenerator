<?php
    // Sign-in validation
    require("../HelpFunctions.php");
    require("../Server/dbConnection.php");

    $Fields = array("username", "pass");

    // Will check if user has entered all of the fields and if not will exit
    if (!CheckFields($Fields))
    {
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    $dbUsersTable = GetDbUsersTable();
    $username = Get($Fields[0]);
    $password = Get($Fields[1]);
    // Query that checks if user exists
    $query = "select * from $dbUsersTable where Username = '$username' and Password = '$password'";
    $isValid = mysqli_query($dbConnection, $query);

    // User does not exist
    if (mysqli_num_rows($isValid) == 0)
    {
        // Display error msg
        EchoError("The username or password is invalid");
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Close connection
    CloseDbConnection($dbConnection);
    // Start the session to save the username
    session_start();
    $_SESSION["Username"] = $username;
    // Go to homepage
    HeadTo("../Index/index.php"); 
?>