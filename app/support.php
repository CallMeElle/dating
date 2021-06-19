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
    echo file_get_contents("html/leiste.html");
    ?>    
        <div class="main">
          <table class="datatable">
            <thead>
              <tr>
                <td>ID</td>
                <td>Datum</td>
                <td>Titel</td>
              <tr>
            </thead>
            <tbody>
              <?php
                  $supportTickets = getSupportTickets();
                  foreach($supportTickets as $ticket) {
                    ?><tr onClick="window.location = 'supportDetails.php?ticketnummer=<?php echo $ticket->Ticketnummer ?>'">
                  <td><?php echo $ticket->Ticketnummer ?></td>
                  <td><?php echo $ticket->Fragedatum ?></td>
                  <td><?php echo $ticket->Titel ?></td>
                </tr>
                    <?php
                  }
              ?>
            </tbody>
          </table>
        </div>
        <div class="main">

        <form action="neuesSupportticket.php" method="post" class="show" >
                <input type="Text" name="titel" value="" size="12" placeholder="Titel" autocomplete="on" />
                <input type="Text" name="frage" value="" size="12" minlength="5" placeholder="Frage" autocomplete="on" />
      
                <input type="Submit" name="Submit" value="Erstellen"/>
            </form>
        </div>

        <?php
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
    </body>
</html>