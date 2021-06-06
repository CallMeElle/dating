<?php

    $Nutzernummer=$_POST["Nutzernummer"];
    $Username=$_POST["Username"];
    $Passwort=$_POST["Passwort"];
    
    include "mysql_connect.php";
    $query= "INSERT INTO Nutzer (Nutzernummer, Username, Passwort) values ('$Nutzernummer','$Username','$Passwort')";
    $result=mysqli_query($db,$query);
    include('head.php');
    if($result){
        echo 'Eintrag erfolgreich!';
    }
    else{
        echo'Fehler bei der Anfrage!';
    }
    include('foot.php');
?>
