<?php
session_start();
include "mysql_connect.php";
$Username = $_POST['Username'];
$result = mysqli_query($db, "SELECT Passwort FROM Nutzer WHERE Username='Hansdampf' ");
$rpasswort = mysqli_fetch_string($result); 
if ( isset($_POST['Username']) 
		 and isset($_POST['Passwort'])
		 and $rpasswort == ($_POST['Passwort'])
		)
	{
		$_SESSION['Username'] = $_POST['Username'];
                $_SESSION['Passwort'] = $_POST['Passwort'];
                echo 'Du bist jetzt eingeloggt';
	}
 else { echo 'Hat net geklappt';
        echo $rpasswort;
        echo $Username;
       } 
?>