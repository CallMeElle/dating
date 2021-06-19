<?php
    include_once "Funktionen/main.php";
    session_start(); 
    $erfolg = createTicket($_POST['titel'], $_POST['frage']);

    if ($erfolg) {
        header("Location: support.php");
        die();
    } else {
        echo "Fehler beim Ersetllen des Tickets.";
    } 
?> 