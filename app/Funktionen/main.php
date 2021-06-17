<?php
  include_once "mysql_connect.php";
  function getLogin() {
    if (session_id() == '') { // || !isset($_SESSION['username'])) {
        //header("Location: index.php");
        //die();
    }
    return $_SESSION['username'];
  }
  function getSupportTickets() {
    try {
        $db = connectDB();
        $stmt1 = mysqli_prepare($db, "SELECT Ticketnummer,Fragedatum,Titel FROM Support WHERE Nutzernummer = ?");
        
        mysqli_stmt_bind_param($stmt1, "s", $_SESSION['nutzernummer']);
        mysqli_stmt_execute($stmt1);
        
        $support = array();
        $result = $stmt1->get_result();
        // echo "Debug: " . $_SESSION['nutzernummer'] . " Ende.";
        while($row = $result->fetch_object()) {
            echo "Debug: " . $row;
          $support[$row->Ticketnummer] = $row;
        }
        $stmt1->close();
        mysqli_close($db);
        return $support;
    }catch(mysqli_sql_exception $e){
        echo $e;
        mysqli_close($db);
    }
  }

  // gibt die Nutzernummer zurück, oder -1 bei Fehler
  function login($username, $password) {
    try {
        $db = connectDB();
        $stmt1 = mysqli_prepare($db, "SELECT Nutzernummer, Passwort FROM Nutzer WHERE Username = ?");
        
        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt1, "s", $username);

        /* execute query */
        mysqli_stmt_execute($stmt1);
        
        mysqli_stmt_bind_result($stmt1, $nutzernummer, $pwd);
        mysqli_stmt_fetch($stmt1);
        mysqli_close($db);
        
        if(!$pwd || $password != $pwd) {
            return -1;
        }
        return $nutzernummer;
    }catch(mysqli_sql_exception $e){
        echo $e;
        mysqli_close($db);
    }
}
?>