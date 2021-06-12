<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
?>

<html>
    <body>
        <div class="main">
            Willkommen, wie können wir Dir helfen?..
            <a href="sign_up.php">hier gehts zur Registrierung</a>
        </dev>
    </body>
</html>

<?php 
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
