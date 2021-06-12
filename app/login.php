<?php
session_start();
include "mysql_connect.php";
$Username = $_POST['Username'];
setcookie("Username", $Username, time()+3600, "", "", true);
include "session_page1.php";
$result = mysqli_query($db, "SELECT Passwort FROM Nutzer WHERE Username='$Username' "); //sucht in Tabelle Nutzer nach Passwort zum eingegebenen Username

if (mysqli_num_rows($result) == 1) {    //prüft, ob der angegebene Username vorhanden ist
while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)){

$passwortkorrekt = $zeile['Passwort'];}


 
  
if ( isset($_POST['Username']) 
		 and isset($_POST['Passwort'])
		 and $passwortkorrekt == $_POST['Passwort'] //ueberprüft, ob eingegebenes Passwort mit Passwort aus dB übereinstimmt
		)
	{
		$_SESSION['Username'] = $_POST['Username'];
                $_SESSION['Passwort'] = $_POST['Passwort'];
                echo 'Du bist jetzt eingeloggt';
	}
 else { echo 'Dein Passwort stimmt leider nicht';
       } 
}
else { echo 'Dieser Username ist leider nicht vorhanden';}
?>
