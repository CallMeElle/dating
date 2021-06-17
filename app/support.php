<?php
  include_once "Funktionen/main.php";
  session_start();
  $login = getLogin();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <?php
  echo file_get_contents("html/header.html");
  ?>
  <body>
    <?php
    echo file_get_contents("html/head.html");
    echo "Nutzernummer: " . $_SESSION['nutzernummer'];
    ?>    
        <div class="main">
          <table>
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
                  foreach($ticket as $supportTickets) {
                    ?><tr>
                  <td><?php echo $ticket->Tickernummer ?></td>
                  <td><?php echo $ticket->Fragedatum ?></td>
                  <td><?php echo $ticket->Titel ?></td>
                </tr>
                    <?php
                  }
              ?>
            </tbody>
          </table>
        </div>
        <?php
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
    </body>
</html>