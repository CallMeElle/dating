<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
    
    include_once("account_management.php");
    
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
?>


<html>
    <body>
        <div class="main">

            <?php
                $Username = $_POST["register_Username"];
                $Passwort = $_POST["register_Passwort"];
                $Email = $_POST["register_Email"];
                
                $err = register($Username, $Passwort, $Email);
                
                if($err){
                    echo "Fehler bei der Anmeldung";
                }else{
                    echo "Neuer nutzer erfolgreich erstellt";
                }
            ?>    
            
        </div>
    </body>
</html>
  
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
    
?>
