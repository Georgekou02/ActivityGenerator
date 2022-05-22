<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>

    <body>
        <header>
            <h1>Login Page</h1>
        </header>

        <main>  
            <form action="#" method="post">
                <label>Username:</label>
                <input name="username" type="text" maxlength="30" placeholder="Enter your username" required/>
                <div id="PasswordField">
                    <label>Password:</label>
                    <input name="pass" type="password" maxlength="30" placeholder="Enter your password" required/>  
                </div>
                <button name="loginBtn">Login</button>
            </form>

            <p>
                Don't have an account. Create one
                <a href="../Signup/signup.php">here</a>
            </p>
        </main>
    </body>
</html>

<?php
    if (!isset($_POST["loginBtn"])) // Cannot use Get() since the form has not been submitted the first time
        exit();

    require("../Server/validation.php");
?>