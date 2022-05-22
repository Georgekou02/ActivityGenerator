<?php
    function Get($name)
    {
        return $_POST[$name];
    }
    function EchoError($msg)
    {
        echo "<br/><center><span style='color: red;'>$msg</span></center>";
    }
    function CheckFields($Fields)
    {
        for ($i = 0; $i < count($Fields); $i++)
        {
            if (empty(Get($Fields[$i])))
                exit();
        }

        return true;
    }
    function GetDbName()
    {
        return "ConnectToDB_FormDatabase";
    }
    function GetDbUsersTable()
    {
        return "Users";
    }
    function HeadTo($location)
    {
        header("location: ". $location);
    }
    function CloseDbConnection($connName)
    {
        mysqli_close($connName);
    }
?>