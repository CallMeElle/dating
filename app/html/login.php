<?php
session_start();
include "Funktionen/mysql_connect.php";
$Username = $_POST['Username'];
$result = mysqli_query($db, "SELECT Passwort FROM Nutzer WHERE Username='Hansdampf' ");
while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)){
echo $zeile['Passwort'];

$num_rows = mysqli_num_rows($result);
$bitte = $zeile['Passwort']; 
  
if ( isset($_POST['Username']) 
		 and isset($_POST['Passwort'])
		 and 1 ==2
		)
	{
		$_SESSION['Username'] = $_POST['Username'];
                $_SESSION['Passwort'] = $_POST['Passwort'];
                echo 'Du bist jetzt eingeloggt';
	}
 else { echo 'Hat nicht geklappt';
        echo $num_rows;
        echo $bitte;
        echo $Username;
       } 
?>