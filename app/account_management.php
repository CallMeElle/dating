<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

    include_once "mysql_connect.php";
        
    //rückgabewert true, wenn fehler oder nutzer existiert
    function does_user_exist ($Username){
        if(!isset($Username)){
            printJSDebug("No user given");
            return true;
        }
    
        printJSDebug("checking if User $Username exists");
    
        include_once "helper.php";
        
        try{
            $db = connectDB();
        
            $stmt1 = mysqli_prepare($db, "SELECT Nutzernummer FROM Nutzer WHERE Username = ?");
            
            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt1, "s", $Username);

            /* execute query */
            mysqli_stmt_execute($stmt1);
            
            $result = mysqli_stmt_get_result($stmt1);
            
            if(!$result){
                mysqli_close($db);
                return true;
            }
            
            if(mysqli_num_rows($result) > 0){
                printJSDebug("Der Nutzer $Username existiert");
                mysqli_close($db);
                return true;
            }
            
        } catch(mysqli_sql_exception $e){
            echo $e;
            mysqli_close($db);
            return true;
            //printJSDebug("$e");
        }
        
        return false;
    }
    
    //rückgabewert true, wenn ein fehler passiert ist
    function register($Username, $Passwort, $Email){
    
        include_once "session.php";
    
        if(!isset($Username)){
            printJSDebug ("Username nicht gesetzt");
            return true;
        }
        
        if(!isset($Passwort)){
            printJSDebug ("Passwort nicht gesetzt");
            return true;
        }
        
        if(!isset($Email)){
            printJSDebug ("Email nicht gesetzt");
            return true;
        }
        
        if(does_user_exist($Username)){
            printJSDebug("Nutzer existiert");
            return true;
        }
        
        printJSDebug("Creating the session");
        setcookie("Username", $Username, time()+3600, "", "", true);
        create_session();
        
        try{
        
            $db = connectDB();
            $stmt = mysqli_prepare($db, "INSERT INTO Nutzer (Username, Passwort, Email) VALUES (?, ?, ?)");
            
            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "sss", $Username, $Passwort, $Email);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            //checking if the user was created
            if(mysqli_stmt_affected_rows($stmt) < 1){
                printJSDebug("Nutzer nicht zur Datenbank hinzugefügt");
                
                mysqli_close($db);
                return true;
            }
            
            mysqli_close($db);
            
            if(!does_user_exist($Username)){
                printJSDebug("Nutzer nicht in Datenbank gefunden");
                return true;
            }
            
            printJSDebug("Neuer Nutzer erstellt");
        }catch(mysqli_sql_exception $e){
            echo $e;
            mysqli_close($db);
            //printJSDebug("$e");
        }
        
        return false;
    }
?>
