<?php   
    // Register validation    
    require("../HelpFunctions.php");
    require("../Server/dbConnection.php");

    $Fields = array("username", "pass", "email", "captcha");

    // Will check if user has entered all of the fields and if not will exit
    if (!CheckFields($Fields))
    {
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Checking if captcha was entered correctly
    session_start();
    $captchaText = $_SESSION["Captcha"];
    $userCaptchaText = Get($Fields[3]);

    // Capcha validation
    if ($userCaptchaText != $captchaText)
    {
        EchoError("Captchas do not match");
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Get fields
    $username = Get($Fields[0]);
    $password = Get($Fields[1]);
    $email = Get($Fields[2]);
    
    // Username min requirements validation
    $usernameMinChars = 8;
    // // Remove white spaces
    $username = trim($username);
    // Not enough chars
    if (strlen($username) < $usernameMinChars)
    {
        EchoError("Username should be at least " . $usernameMinChars . " long");
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }
    // Username format
    $usernameRegex = "/^[a-zA-z\d]+$/";
    if (!preg_match($usernameRegex, $username))
    {
        EchoError("Invalid username format");
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Password min requirements validation
    $passMinChars = 8;
    $password = trim($password);
    // Not enough chars
    if (strlen($password) < $passMinChars)
    {
        EchoError("Password should be at least " . $passMinChars . " long");
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Email min requirements validation
    // Trim white spaces
    $email = trim($email);
    // Email format
    // Before '@' only allow a-z, A-Z & 0 - 9
    // After '@' make sure its at least 2 chars long before '.' and only allow a-z
    // After '.' make sure its at least 2 chars long as well
    $emailRegex = "/^[a-zA-z\d\.]+@[a-z]{2,}+\.[a-z\.]{2,}+$/";
    if (!preg_match($emailRegex, $email))
    {
        EchoError("Invalid email format");
        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Checking if username and email already exist in DB
    $dbUsersTable = GetDbUsersTable();
    // Check if username exists query
    $query =  "select * from $dbUsersTable where Username = '$username'";
    $checkIfUsernameExistsQuery = mysqli_query($dbConnection, $query);
    // Check if email exists query
    $query =  "select * from $dbUsersTable where Email = '$email'";
    $checkIfEmailExistsQuery = mysqli_query($dbConnection, $query);
    
    // Username or Email already exists, display error msg
    if (mysqli_num_rows($checkIfUsernameExistsQuery) > 0 or mysqli_num_rows($checkIfEmailExistsQuery) > 0)
    {
        if (mysqli_num_rows($checkIfUsernameExistsQuery) > 0) 
            EchoError("That username already exists");

        else // I could add both Username already exists and Email already exists, if they both already existed but I chose not to
            EchoError("That email already exists");

        // Close connection
        CloseDbConnection($dbConnection);
        exit();
    }

    // Query to add user to the DB
    $query = "insert into $dbUsersTable(Username, Password, Email) values('$username', '$password', '$email')";
    $addUserQuery = mysqli_query($dbConnection, $query);
    // Close connection
    CloseDbConnection($dbConnection);
    
    // Failed to add user to the DB
    if (!$addUserQuery)
    {
        EchoError("Something went wrong. Please try again");
        exit();
    }
    
    //User added to the DB
    HeadTo("../Login/login.php");
?>