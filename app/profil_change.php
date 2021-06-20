<?php  
    include_once "Funktionen/main.php";
    session_start();
    $login = getLogin();
   include_once "Funktionen/main.php";
    
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

                
                $Vorname = $_POST["change_Vorname"];
                $Nachname = $_POST["change_Nachname"];
                $Geburtsdatum = $_POST["change_Geburtsadatum"];
		        $Geschlecht = $_POST["change_Geschlecht"];
                $Groesse = $_POST["change_Groesse"];
                $Kinder = $_POST["change_Kinder"];
                
                $query= "UPDATE Profil SET Vorname ='$Vorname', Nachname ='$Nachname', Geburtsdatum ='$Geburtsdatum', Geschlecht = '$Geschlecht', Groesse = '$Groesse', kinder = '$Kinder' WHERE Nutzernummer ='$Nutzernummer'";
                mysqli_query($db,$query);
                echo" Profil wurde angepasst!";                               }
                
            ?>    
            
        </div>
    </body>
</html>
  
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
    
?>
