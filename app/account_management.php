<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    //rückgabewert true, wenn fehler oder nutzer existiert
    function does_user_exist ($Username){
        if(!isset($Username)){
            printJSDebug("No user given");
            return true;
        }
    
        printJSDebug("chcking if User $Username exists");
    
        include_once "mysql_connect.php";
        include_once "helper.php";
        
        try{
            $stmt = mysqli_prepare($db, "SELECT * FROM Benutzer WHERE Username = ?");
            
            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "s", $Username);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if(!$result){
                return true;
            }
            
            if(mysqli_num_rows($result) == 0){
                return false;
            }
            
            printJSDebug("Der Nutzer $Username existiert");
            return true;
            
        } catch(mysqli_sql_exception $e){
            echo $e;
            return true;
            //printJSDebug("$e");
        }
    }
    
    //rückgabewert true, wenn ein fehler passiert ist
    function register($Username, $Passwort){
    
        include_once "session.php";
    
        if(!isset($Username)){
            printJSDebug ("Username nicht gesetzt");
            return true;
        }
        
        if(!isset($Passwort)){
            printJSDebug ("Passwort nicht gesetzt");
            return true;
        }
        
        if(does_user_exist($Username)){
            printJSDebug("Nutzer existiert");
            return true;
        }
        
        printJSDebug("Creating the session");
        setcookie("Username", $Username, time()+3600, "", "", true);
        create_session();
        
        mysqli_report(MYSQLI_REPORT_ALL);
        include_once "mysql_connect.php";
        
        try{
            $stmt = mysqli_prepare($db, "INSERT INTO Benutzer (Username, Passwort) VALUES (?, ?)");
            
            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "ss", $Username, $Passwort);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            //checking if the user was created
            if(mysqli_stmt_affected_rows($stmt) == ""){
                printJSDebug("Nutzer nicht zur Datenbank hinzugefügt");
                return true;
            }
            
            if(!does_user_exist($Username)){
                printJSDebug("Nutzer nicht in Datenbank gefunden");
                return true;
            }
            
            printJSDebug("Neuer Nutzer erstellt");
        }catch(mysqli_sql_exception $e){
            echo $e;
            //printJSDebug("$e");
        }
        
        return false;
    }
?>
