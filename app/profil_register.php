<?php  
    include_once "Funktionen/main.php";
    ensureLogin();

	$db = connectDB();
    
?>


<html>
    <?php
        echo file_get_contents("html/header.html");
    ?>  

    <body>
    
    <?php
        include_once "html/leiste.php";
    ?>  

        <div class="main">

            <?php
              if (getLogin() == true) {
                $result = mysqli_query($db, "SELECT Nutzernummer FROM Nutzer WHERE Username='$login' ");
                if (mysqli_num_rows($result) == 1) {    
                    while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $Nutzernummer = $zeile['Nutzernummer'];}}

                $Vorname = $_POST["register_Vorname"];
                $Nachname = $_POST["register_Nachname"];
                $Geburtsdatum = $_POST["register_Geburtsadatum"];
		$Geschlecht = $_POST["register_Geschlecht"];
                $Groesse = $_POST["register_Groesse"];
                $Kinder = $_POST["register_Kinder"];
                
                $query= "INSERT INTO Profil (Nutzernummer,Vorname,Nachname,Geburtsdatum,Geschlecht,Groesse,Kinder) values ('$Nutzernummer','$Vorname','$Nachname','$Geburtsdatum','$Geschlecht','$Groesse','$Kinder')";
                mysqli_query($db,$query);}
                
                echo" Profil wurde gespeichert!";                               }
                
            ?>    
            
        </div>
    </body>
</html>
  
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
    
?>
