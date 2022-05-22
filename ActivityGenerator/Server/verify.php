<?php
    session_start();    
    // Check if user has logged in
    if (!isset($_SESSION["Username"]))
    {
        require("../HelpFunctions.php");
        // If not, redirect to login page
        HeadTo("../Login/login.php");
        exit();
    }
    // If user has logged in, continue
?>