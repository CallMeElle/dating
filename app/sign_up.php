<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
?>

<html>
    <body>
        <div class="main">
            <table border=0>
                <form action="neuernutzer2.php" method="post" >
                    <tr><td align=left>Username:</td><td align=right><input type="Text" name="register_Username" value="" size="12" ></td></tr>
                    <tr><td align=left>Passwort (minderstens 5):</td><td align=right><input type="Text" name="register_Passwort" value="" size="12" minlength="5"></td></tr>
                    <tr><td align=left>Email:</td><td align=right><input type="Text" name="register_Email" value="" size="12" minlength="5"></td></tr>


                    <tr><td align=left colspan=2><br><input type="Submit" name="Submit" value="Jetzt registrieren">&nbsp
                    <input type="reset">
                    </td></tr>
                </form>
            </table>
        </div>
    </body>
</html>

<?php
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>


 
