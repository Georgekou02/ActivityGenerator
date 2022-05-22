<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script type="text/javascript" src="script.js" defer></script>
    </head>

    <body>
        <header>
            <h1>Signup Page</h1>
        </header>

        <main>  
            <section class="Sign-Up">
                <form action="#" method="post">
                    <div class="Username">
                        <div class="Requirements">8 chars minimum, No special chars allowed</div>
                        <label class="Label">Username:</label>
                        <input name="username" type="text" maxlength="30" placeholder="Enter your username" required/>
                    </div>
                    <div class="Password">
                        <div class="Requirements">8 chars minimum</div>
                        <label class="Label">Password:</label>
                        <input name="pass" type="password" maxlength="30" placeholder="Enter your password" required/>  
                    </div>
                    <div class="Email">
                        <div class="Requirements">No special chars allowed except from '.'</div>
                        <label class="Label">Email:</label>
                        <input name="email" type="text" maxlength="30" placeholder="Enter your email" required/>                  
                    </div>
                    <div class="Captcha">
                        <label>Captcha:</label>
                        <input id="CaptchaField" name="captcha" type="text" maxlength="6" required/>
                        <img id="CaptchaImg" src="Captcha/generateCaptcha.php" alt="captcha image"/>
                        <!--In HTML5 all buttons are submit buttons, that's why I have set the type="button"-->
                        <div class="ChangeCapcha">
                            <button id="ChangeCaptchaBtn" type="button" onclick="ChangeCaptcha()">Change captcha</button>
                        </div>
                    </div>
                    <button name="registerBtn" id="RegisterBtn">Register</button>
                </form>
            </section>
            
            <section class="Login-In">
                <p>
                    Already have an account.
                    <a href="../Login/login.php">Sign In</a>
                </p>
            </section>
        </main>
    </body>
</html>

<?php
    if (!isset($_POST["registerBtn"])) // Cannot use Get() since the form has not been submitted the first time
        exit();

    require("../Server/register.php");
?>