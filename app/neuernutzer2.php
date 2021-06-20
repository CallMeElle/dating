<?php  
    include_once "Funktionen/main.php";

    $Username = $_POST["register_Username"];
    $Passwort = $_POST["register_Passwort"];
    $Email = $_POST["register_Email"];

    $err = register($Username, $Passwort, $Email);

    if($err){
        echo "Fehler bei der Registrierung";
    }else{
        header("Location: index.php");
        die();
    }
?>    

