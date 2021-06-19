<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    
    include_once "Funktionen/session.php";

    
    $head_file = file_get_contents("html/head.html");
	$db = connectDB();
    echo $head_file;
?>


<html>
    <body>
        <div class="main">

            <?php
              if (check_session() == true) {
                $result = mysqli_query($db, "SELECT Nutzernummer FROM Nutzer WHERE Username='$Username' ");
                if (mysqli_num_rows($result) == 1) {    
                    while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $Nutzernummer = $zeile['Nutzernummer'];}}

                $Profilnummer = $Nutzernummer;
                $Vorname = $_POST["register_Vorname"];
                $Nachname = $_POST["register_Nachname"];
                $Geburtsdatum = $_POST["register_Geburtsdatum"];
                $Groesse = $_POST["register_Groesse"];
                $Kinder = $_POST["register_Kinder"];
                
                $query= "INSERT INTO Profil (Profilnummer,NutzernummerVorname,Nachname,Geburtsdatum,Groesse,Kinder) values ('$Profilnummer','$Nutzernummer','$Vorname','$Nachname','$Geburtsdatum','$anreise','$Groesse','$Kinder')";
                mysqli_query($db,$query);}
else{echo"bitte anmelden!";}
                
            ?>    
            
        </div>
    </body>
</html>
  
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
    
?>
