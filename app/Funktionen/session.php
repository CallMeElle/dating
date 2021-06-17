<?php

    include_once "helper.php";
    include_once "mysql_connect.php";

    //Starting the session
    function create_session(){
        $_SESSION['name'] = $_COOKIE["Username"];

        if(!isset($_COOKIE["Username"])){
            printJSDebug("Kein Username Cookie gefunden");
            return false;
        }
            
        if(isset($_COOKIE["Session_ID"])){
            printJSDebug("Session_ID Cookie schon gesetzt");
            return false;
        } 
            
        $id = session_create_id();	
        session_id($id);
        setcookie("Session_ID", $id, time()+3600, "", "", true);  /* expire in 1 hour */
        session_start();  

        session_commit();
        printJSDebug("Session_ID Cookie erstellt");

        return true;
    }
    
    //check if the user is logged in
    //returns true if user is logged in
    function check_session(){
        if(!isset($_COOKIE["Username"])){
            return false;
        }
            
        if(!isset($_COOKIE["Session_ID"])){
            return false;
        }
        
        $Username = $_COOKIE["Username"];
        $Session_ID = $_COOKIE["Session_ID"];
        
        $db = connectDB();

        $stmt1 = mysqli_prepare($db, "SELECT Nutzernummer FROM Session WHERE Session_ID = ?");
            
        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt1, "s", $Session_ID);

        /* execute query */
        mysqli_stmt_execute($stmt1);
        
        //ist($User_ID, $Date) = mysqli_stmt_get_result($stmt1);
        mysqli_stmt_bind_result($stmt1, $User_ID);
        mysqli_stmt_fetch($stmt1);

            
        if(!isset($User_ID)){
            return false;
        }
        
        $stmt2 = mysqli_prepare($db, "SELECT Username FROM Benutzer WHERE Nutzernummer = $User_ID; ");
            
        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt2, "s", $Username);

        /* execute query */
        mysqli_stmt_execute($stmt2);
        
        mysqli_stmt_bind_result($stmt2, $Nutzernummer);
        mysqli_stmt_fetch($stmt2);

        mysqli_close($db);
        /*
        if($Username2 != $Username){
            return false;
        }
        */

        //switch visibility for logout button here @todo
        
        
        return true;
    }

    function end_session(){
        session_destroy();
        setcookie("Session_ID", $id, time()-3600, "", "", true);  /* delete cookie by setting expire date on an hour before */
        printJSDebug("Session closed.");
    }
    
?>