<?php 
$gesGröße=$_POST["größenliste"];
if ($gesGröße=="130-140cm"{
$small="130";
$big="140";	
}
else {}
$filter= "SELECT Profil FROM dating_Dating WHERE größe<'$big' and größe>'small'";
$result=mysqli_query($db,$query);
if($result){
        echo 'pog!';
    }
    else{
        echo'nich pog!';
    }
?>
