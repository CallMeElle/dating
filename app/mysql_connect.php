<?php

    $credentials = parse_ini_file("../credentials.ini", true);
    $db = $credentials["db_bplaced"];

    $db_server = $db["host"];      	// DB-Server
    $db_user = $db["user"]; 			// DB- User in einer Variable speichern
    $db_pass = $db["passwort"]; 		// DB- Pass in einer Variable speichern 
    $db_name = $db["dbname"]; 		// DB- Name in einer Variable speichern
    $db = mysqli_connect($db_server, $db_user, $db_pass,$db_name); // Verbindung zur DB aufbauen
?>