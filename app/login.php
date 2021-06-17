<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    include_once "Funktionen/account_management.php";
?>


<html>
    <body>
        <div class="main">

            <?php
                $Username = $_POST["Username"];
                $Passwort = $_POST["Passwort"];
               
                $err = login($Username, $Passwort);
                
                if(!$err){
                    echo "Fehler beim Login";
                }else{
                    header("Location: profil.php");
                    die();
                }

            ?>    
            
        </div>
    </body>
</html>
  
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
    
?>
