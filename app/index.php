<!DOCTYPE html>
<html>
  <?php
  echo file_get_contents("html/header.html");
  ?>
  <body>
    <div class="topbar">
        <div class="login-field">
            <form action="login.php" method="post" class="show" >
                <input type="Text" name="username" value="" size="12" placeholder="Nutzername" autocomplete="on" />
                <input type="Text" name="password" value="" size="12" minlength="5" placeholder="Passwort" autocomplete="on" />
                <input type="Submit" name="Submit" value="Login">
            </form>
        </div>
    </div>
        <div class="main">
            Willkommen, wie können wir Dir helfen?..
            <a href="sign_up.php">hier gehts zur Registrierung</a>
        </div>
      <?php 
      echo file_get_contents("html/foot.html");
      ?>
  </body>
</html>

