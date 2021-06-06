<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php 
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
    
    function login(){
    
    }
?>

<html>
    <body>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <table>
                <tr> <td>  Username: </td><td> <input type="text" name="Username" id="Username" /> </td> </tr>
                <tr> <td>  Password: </td><td> <input type="password" name="Passwort" id="Passwort" /> </td> </tr>
                <tr> <td></td><td> <input type="submit" value="einloggen" /> </td> </tr>
        </table>
        </form>
    </body>
</html>
   
<?php 
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
