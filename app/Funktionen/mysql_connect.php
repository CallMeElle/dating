<?php
    include_once "helper.php";
    function connectDB(){
        mysqli_report(MYSQLI_REPORT_ALL & ~MYSQLI_REPORT_INDEX);
        $credentials = parse_ini_file(dirname(__FILE__) . "/../../credentials.ini", true);
        $db_ini = $credentials["db_bplaced"];

        $db_server = $db_ini["host"];      	// DB-Server
        $db_user = $db_ini["user"]; 			// DB- User in einer Variable speichern
        $db_pass = $db_ini["passwort"]; 		// DB- Pass in einer Variable speichern 
        $db_name = $db_ini["dbname"]; 		// DB- Name in einer Variable speichern
        $db = mysqli_connect($db_server, $db_user, $db_pass,$db_name); // Verbindung zur DB aufbauen
        return $db;
    }
?>
