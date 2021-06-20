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

<?php
    $result = mysqli_query($db, "SELECT Nutzernummer FROM Nutzer WHERE Username='$login' ");
           if (mysqli_num_rows($result) == 1) {    
                while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $Nutzernummer = $zeile['Nutzernummer'];}} //erfragt Nutzernumer des Users
    
   $result2 = mysqli_query($db, "SELECT Profilnummer FROM Profil WHERE Nutzernummer='$Nutzernummer' ");
           if (mysqli_num_rows($result2) == 0) { //ueberprueft, ob bereits ein Profil zum Nutzer vorhanden ist


echo"    <div class='main'>";
echo"       <h2> Profil ändern: </h2>";
echo" <br>";
echo"            <table border=0>";
echo"                <form action='profil_register.php' method='post' >";
echo"                    <tr><td align=left>Vorname:</td><td align=right><input type='Text' name='register_Vorname' value='' size='16'></td></tr>";
echo"                    <tr><td align=left>Nachname:</td><td align=right><input type='Text' name='register_Nachname' value='' size='16' minlength='2'></td></tr>";
echo"                    <tr><td align=left>Geburtsdatum:</td><td align=right><input type='date' name='register_Geburtsadatum' value='' size='12' minlength='5'></td></tr>";
echo"		            <tr><td align=left>Geschlecht:</td><td align=right><input type='Text' name='register_Geschlecht' value='' size='16' minlength='1'></td></tr>";
echo"                    <tr><td align=left>Groesse:</td><td align=right><input type='Text' name='register_Groesse' value='' size='16' minlength='1'></td></tr>";
echo"                    <tr><td align=left>Kinder:</td><td align=right><input type='Text' name='register_Kinder' value='' size='16' minlength='1'></td></tr>";
echo"                    <tr><td align=left colspan=2><br><input type='Submit' name='Submit' value='Profil anlegen'>&nbsp ";
echo"                    <input type='reset'>";
echo"                    </td></tr>";
echo"                </form>";
echo"            </table>";
echo"        </div>"; }

     else{  //für den Fall, dass das Profil bereits existiert, kann es geändert werden
$result = mysqli_query($db, "SELECT  * FROM Profil WHERE Nutzernummer='$Nutzernummer' ");
           if (mysqli_num_rows($result) != 0) {    
                while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $Vorname = $zeile['Vorname'];
		$Nachname = $zeile['Nachname'];
		$Geburtsdatum = $zeile['Geburtsdatum'];		
		$Geschlecht = $zeile['Geschlecht'];
		$Groesse = $zeile['Groesse'];
		$Kinder = $zeile['Kinder'];
                 }}




echo"    <div class='main'>";
echo"       <h2> Profil ändern: </h2>";
echo" <br>";
echo"            <table border=0>";
echo"                <form action='profil_change.php' method='post' >";
echo"                    <tr><td align=left>Vorname:</td><td align=right><input type='Text' name='change_Vorname' value=' ".$Vorname."' size='16'></td></tr>";
echo"                    <tr><td align=left>Nachname:</td><td align=right><input type='Text' name='change_Nachname' value=' ".$Nachname."' size='16' minlength='2'></td></tr>";
echo"                    <tr><td align=left>Geburtsdatum:</td><td align=right><input type='date' name='change_Geburtsadatum' value=' ".$Geburtsdatum."' size='12' minlength='5'></td></tr>";
echo"		            <tr><td align=left>Geschlecht:</td><td align=right><input type='Text' name='change_Geschlecht' value=' ".$Geschlecht."' size='16' minlength='1'></td></tr>";
echo"                    <tr><td align=left>Groesse:</td><td align=right><input type='Text' name='change_Groesse' value=' ".$Groesse."' size='16' minlength='1'></td></tr>";
echo"                    <tr><td align=left>Kinder:</td><td align=right><input type='Text' name='change_Kinder' value=' ".$Kinder."' size='16' minlength='1'></td></tr>";
echo"                    <tr><td align=left colspan=2><br><input type='Submit' name='Submit' value='Profil ändern'>&nbsp ";
echo"                    <input type='reset'>";
echo"                    </td></tr>";
echo"                </form>";
echo"            </table>";
echo"        </div>"; }


?>
 </body>
</html>
<?php
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
