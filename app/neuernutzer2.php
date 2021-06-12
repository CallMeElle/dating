<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    
    include_once("account_management.php");
    
    include_once('head.php');

    $Username=$_POST["register_Username"];
    $Passwort=$_POST["register_Passwort"];
    
    $err = register($Username,$Passwort);
    
    if($err){
        echo "Fehler bei der Anmeldung";
    }
    
    
    include_once('foot.php');
    
?>
