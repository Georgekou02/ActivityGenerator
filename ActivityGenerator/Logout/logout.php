<?php
    session_start();
    // Check if user was logged in
    if (!isset($_SESSION["Username"]))
    {
        require("../HelpFunctions.php");
        // If not, redirect to login page
        HeadTo("../Login/login.php");
        exit();
    }
    // If user was logged in, destroy session
    session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>

    <body>
        <header>
            <h1>Logout Successfully</h1>
        </header>

        <main>
            <p>
                Click 
                <a href="../Login/login.php">here</a>
                to sign in again
            </p>    
        </main>
    </body>
</html>