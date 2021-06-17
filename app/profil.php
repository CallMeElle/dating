<?php
  include_once "Funktionen/main.php";
  session_start();
  $login = getLogin();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  echo file_get_contents("html/header.html");
  <body>
    <?php
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
    echo "Eingeloggt als Nutzer: " . $login;
?>    
        <div class="main">
            <table border=0>
                <form action="profil_register.php" method="post" >
                    <tr><td align=left>Vorname:</td><td align=right><input type="Text" name="register_Vorname" value="" size="12" ></td></tr>
                    <tr><td align=left>Nachname:</td><td align=right><input type="Text" name="register_Nachname" value="" size="12" minlength="2"></td></tr>
                    <tr><td align=left>Geburtsdatum:</td><td align=right><input type="date" name="register_Geburtsadatum" value="" size="12" minlength="5"></td></tr>
		    <tr><td align=left>Geschlecht:</td><td align=right><input type="Text" name="register_Geschlecht" value="" size="12" minlength="1"></td></tr>
                    <tr><td align=left>Groesse:</td><td align=right><input type="Text" name="register_Groesse" value="" size="12" minlength="1"></td></tr>
                    <tr><td align=left>Kinder:</td><td align=right><input type="Text" name="register_Kinder" value="" size="12" minlength="1"></td></tr>


                    <tr><td align=left colspan=2><br><input type="Submit" name="Submit" value="Jetzt registrieren">&nbsp
                    <input type="reset">
                    </td></tr>
                </form>
            </table>
        </div>
        <?php
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
    </body>
</html>