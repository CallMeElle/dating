<?php

    include_once "mysql_connect.php";
    include_once "helper.php";
    include_once "session.php";

    //rückgabewert true wenn nutzer existiert, 1 wenn fehler passiert
    function does_user_exist ($Username){
        if(!isset($Username)){
            printJSDebug("No user given");
            return 1;
        }
    
        printJSDebug("checking if User $Username exists");
        
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
                printJSDebug("Kein Eintrag");
                return 1;
            }
            
            if(mysqli_num_rows($result) > 0){
                printJSDebug("Der Nutzer $Username existiert");
                mysqli_close($db);
                return true;
            }
            
        } catch(mysqli_sql_exception $e){
            echo $e;
            mysqli_close($db);
            return 1;
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

    //true wenn login erfolgreich
    function login($Username, $Passwort){
       
        if($_COOKIE["Username"] == $Username){
            if(check_session()){
                printJSDebug("Der User ist schon angemeldet");
                return true;
            }
            //andernfalls logout
        }

        if(does_user_exist($Username) != true){
            printJSDebug("Ein User mit diesem Nutzernamen existiert nicht");
            return false;
        }

        if(!isset($Passwort)){
            printJSDebug("Kein Passwort wurde übergeben");
            return false;  
        }

        $Nutzernummer = 0;
       
        printJSDebug("fetching the passwort");
        try{
            $db = connectDB();
            $stmt1 = mysqli_prepare($db, "SELECT Nutzernummer, Passwort FROM Nutzer WHERE Username = ?");
            
            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt1, "s", $Username);

            /* execute query */
            mysqli_stmt_execute($stmt1);
            
            mysqli_stmt_bind_result($stmt1, $Nutzernummer, $pwd);
            mysqli_stmt_fetch($stmt1);
            mysqli_close($db);
            
            if(!$pwd){
                return false;
            }

            if($Passwort != $pwd){
                printJSDebug("Falsches Passwort");
                return false;
            }


        }catch(mysqli_sql_exception $e){
            echo $e;
            mysqli_close($db);
        }

        printJSDebug("Creating the session");
        $_COOKIE["Username"] = $Username; 
        setcookie("Username", $Username, time()+3600, "", "", true);
        create_session();
        $SessionID = $_COOKIE["Session_ID"];

        /*
        try{
            $db = connectDB();
            $stmt = mysqli_prepare($db, "INSERT INTO Nutzer (Username, Passwort, Email) VALUES (?, ?, ?)");
            
            //bind parameters for markers
            mysqli_stmt_bind_param($stmt, "sss", $Username, $Passwort, $Email);

            //execute query
            mysqli_stmt_execute($stmt);
            
            //checking if the user was created
            if(mysqli_stmt_affected_rows($stmt) < 1){
                printJSDebug("Nutzer nicht zur Datenbank hinzugefügt");
                
                mysqli_close($db);
                return true;
            }
            
            mysqli_close($db);
            
        }catch(mysqli_sql_exception $e){
            echo $e;
            mysqli_close($db);
        }
        */
        return true;
    }

    function logout(){
        end_session();
        setcookie("Username", $Username, time()-3600, "", "", true);
        return true;
    }
?>

