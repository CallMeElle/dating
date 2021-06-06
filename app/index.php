<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
?>

<html>
    <body>
        Willkommen, wie können wir Dir helfen?..
        <a href="neuernutzer.php">hier gehts zur Anmeldung</a>
    </body>
</html>

<?php 
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>