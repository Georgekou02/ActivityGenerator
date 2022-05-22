<?php require("../Server/verify.php")?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Homepage</title>
        <script type="text/javascript" src="script.js" defer></script>
    </head>

    <body>
        <header>
            <a id="LogoutBtn" href="../Logout/logout.php">Logout</a>
            <h1>Are you feeling bored <?php echo $_SESSION["Username"]; ?>?</h1>
            <h2>Pick an activity</h2>
        </header>

        <section>
            <div id="ActivityContainer">
                <div>
                    <label>Activity:</label>
                    <span id="Activity"></span> 
                </div>
                <div>
                    <label>Type:</label>
                    <span id="Type"></span> 
                </div>
                <div id="ChooseAnotherActivityContainer">
                    <button id="ChangeActivityBtn">Choose another activity</button>
                </div>
            </div>
        </section>
    </body>
</html>