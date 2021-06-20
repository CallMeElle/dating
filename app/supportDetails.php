<?php
  include_once "Funktionen/main.php";
  session_start();
  $login = getLogin();
?>
<!DOCTYPE html>
<html>
  <?php
  echo file_get_contents("html/header.html");
  ?>
  <body>
    <?php
    
        include_once "html/leiste.php";
        $ticket = getSupportTicket($_GET['ticketnummer']);
    ?>    
        <div class="main">
            <form class="show" >
                <table>
                    <tr> 
                    <td> <label for="ticketnummer">Nummer: </label> </td><td> <input type="Text" name="ticketnummer" disabled="true" value="<?php echo $ticket->Ticketnummer ?>" /></td></tr>
                    <tr><td><label for="fragedatum">Datum: </label> </td><td> <input type="Text" name="fragedatum" disabled="true" value="<?php echo $ticket->Fragedatum; ?>" /></td></tr>
                    <tr><td> <label for="titel">Titel: </label> </td><td> <input type="Text" name="titel" disabled="true" value="<?php echo $ticket->Titel; ?>" /></td></tr>
                    <tr><td><label for="frage">Frage: </label> </td><td> <textarea name="frage" disabled="true"><?php echo $ticket->Frage; ?></textarea></td></tr>
                
                    <tr><td> <label for="frage">Antwort: </label> </td><td> <textarea name="antwort" disabled="true"><?php echo $ticket->Antwort; ?></textarea></td></tr>
                </table>
            </form>
        </div>

        <?php
            $foot_file = file_get_contents("html/foot.html");
            echo $foot_file;
        ?>
    </body>
</html>