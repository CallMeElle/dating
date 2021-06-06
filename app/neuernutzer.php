<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
?>

<html>
    <body>
        <table border=0>
        <form action="neuernutzer2.php" method="post" >
        <tr><td align=left>Nutzernummer:</td><td align=right><input type="Text" name="Nutzernummer" value="" size="12" ></td></tr>
        <tr><td align=left>Username:</td><td align=right><input type="Text" name="Username" value="" size="12" ></td></tr>
        <tr><td align=left>Passwort (minderstens 5):</td><td align=right><input type="Text" name="Passwort" value="" size="12" minlength="5"></td></tr>

        <tr><td align=left colspan=2><br><input type="Submit" name="Submit" value="Jetzt anmelden">&nbsp
        <input type="reset">
        </form></td></tr></table>
    </body>
</html>

<?php
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>


