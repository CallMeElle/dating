<?php
    include_once "Funktionen/main.php";

    $nutzernummer=login($_POST['username'], $_POST['password']);
    if ($nutzernummer != -1) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['nutzernummer'] = $nutzernummer;
        session_commit();
        //header("Location: profil.php");
        header("Location: support.php");
        die();
    } else {
      echo "Fehler beim Login";
    }
?>