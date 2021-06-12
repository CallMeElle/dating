<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">


<?php

    //Starting the session
    function create_session(){
        $_SESSION['name'] = $_COOKIE["Username"];

        if(!isset($_COOKIE["Username"])){
            return false;
        }
            
        if(isset($_COOKIE["Session_ID"])){
                return false;
        } 
            
        $id = session_create_id();	
        session_id($id);
        setcookie("Session_ID", $id, time()+3600, "", "", true);  /* expire in 1 hour */
        session_start();  

        session_commit();

        return true;
    }
    
    //check if the user is logged in
    function check_session(){
        if(!isset($_COOKIE["Username"])){
            return false;
        }
            
        if(!isset($_COOKIE["Session_ID"])){
            return false;
        }
        
        $Username = $_COOKIE["Username"];
        $Session_ID = $_COOKIE["Session_ID"];
        
        include "mysql_connect.php";
        
        $escapedSessionID = mysqli_real_escape_string($db, $Session_ID);
        $query1 = "SELECT Nutzernummer, Erstellungsdatum FROM Session WHERE Session_ID == $escapedSessionID; ";
        list($UserID, $Date) = mysqli_query($db,$query1);
        
        if(!isset($UserID)){
            return false;
        }
        
        $query2 = "SELECT Username FROM Benutzer WHERE Nutzernummer == $UserID; ";
        $Username2 = mysqli_query($db,$query2);
        
        if($Username2 != $Username){
            return false;
        }
        
        
        return true;
    }
    
?>

