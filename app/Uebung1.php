<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

    <?php
        include "mysql_connect.php"; 
        //$credentials = parse_ini_file("../credentials.ini", true);
        //print_r($credentials);
        //$db = $credentials["db_bplaced"];

        /*$dbaddress = $db["host"];
        $user = $db["user"];
        $pwd = $db["passwort"];
        //$pwd = file_get_contents(".pwd");
        $dbname = $db["dbname"];*/
        //$db = mysqli_connect($dbaddress,$user,$pwd,$dbname);
        //$db = mysqli_connect($db_server, $db_user, $db_pass,$db_name); // Verbindung zur DB aufbauen

        if (!$db) {
        die ('Could not connect: ' . mysql_error());
        }

        //if connection is successfully you will see message below
        echo "
            <script>
                console.log('Connected successfully' );
            </script>";
    ?>

    <head>
    <link rel="stylesheet" type="text/css" href="index.css" media="screen"/>
    <title> Datenbank </title>
    </head>

    <body>
        <h1> Datenbank </h1>
        <p>
            Ein kurzer Satz.
        </p>
    </body>

    <?php

        mysqli_close($db);

    ?>

</html>
