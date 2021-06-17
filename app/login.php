<?php
    error_reporting(E_ERROR | E_PARSE);
    include_once "Funktionen/account_management.php";
                $Username = $_POST["Username"];
                $Passwort = $_POST["Passwort"];
               
                $err = login($Username, $Passwort);
                
                if(!$err){
                    echo "Fehler beim Login";
                }else{
                    header("Location: profil.php");
                    die();
                }

?>