<?php
session_start();
include "mysql_connect.php";
$Username = $_POST['Username'];
$result = mysqli_query($db, "SELECT Passwort FROM Nutzer WHERE Username='Hansdampf' ");
$rpasswort = mysqli_fetch_array($result);
$num_rows = mysqli_num_rows($result);
$bitte = $rpasswort['Passwort']; 
  
if ( isset($_POST['Username']) 
		 and isset($_POST['Passwort'])
		 and 1 ==2
		)
	{
		$_SESSION['Username'] = $_POST['Username'];
                $_SESSION['Passwort'] = $_POST['Passwort'];
                echo 'Du bist jetzt eingeloggt';
	}
 else { echo 'Hat net geklappt';
        echo $num_rows;
        echo $bitte;
        echo $Username;
       } 
?>