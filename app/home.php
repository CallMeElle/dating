<?php
  include_once "Funktionen/main.php";
  ensureLogin();
?>

<!DOCTYPE html>
<html>

  <?php
  echo file_get_contents("html/header.html");
  ?>

  <body>

    <?php
    include_once "html/leiste.php";
    ?>  

        <div class="main"> 
            <h2>    
                Herzlich Willkommen 
            </h2>
                Danke, dass sie sich für DIE Datingseite Deutschlands entschieden haben. <br>
                Wir garantieren ihnen, einsame Nächte sind vergangenheit!!!<br>
        </div>

      <?php

        $foot_file = file_get_contents("html/foot.html");
        echo $foot_file;
      ?>
  </body>
</html>