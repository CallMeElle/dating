<!DOCTYPE html>
<?php
  echo file_get_contents("html/header.html");
  echo file_get_contents("html/head.html");
  
  ?>
<html>
    <body>
        <br>
              Melde Dich an, um mit dem Dating zu beginnen!
    </body>
</html>
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>

