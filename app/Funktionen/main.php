<?php
  include_once "mysql_connect.php";
  function getLogin() {
    if (session_id() == '' || !isset($_SESSION['username'])) {
        header("Location: index.php");
        die();
    }
    return $_SESSION['username'];
  }
  function createTicket($titel, $frage) {
    $login = getLogin();
    try {
      $db = connectDB();
      $stmt1 = mysqli_prepare($db, "INSERT INTO Support (Nutzernummer, Titel, Frage, Fragedatum) VALUES (?, ?, ?, NOW())");
      mysqli_stmt_bind_param($stmt1, "sss", $_SESSION['nutzernummer'], $titel, $frage);
      mysqli_stmt_execute($stmt1);
      mysqli_close($db);
      return true;
  }catch(mysqli_sql_exception $e){
      echo $e;
      mysqli_close($db);
      return false;
  }
  
  }
  function getSupportTicket($ticketnummer) {
    try {
        $db = connectDB();
        $stmt1 = mysqli_prepare($db, "SELECT * FROM Support WHERE Nutzernummer = ? AND Ticketnummer = ?");
        
        mysqli_stmt_bind_param($stmt1, "ss", $_SESSION['nutzernummer'], $ticketnummer);
        mysqli_stmt_execute($stmt1);
        
        $support = array();
        $result = $stmt1->get_result();
        $ticket = $result->fetch_object();
        $stmt1->close();
        mysqli_close($db);
        return $ticket;
    }catch(mysqli_sql_exception $e){
        echo $e;
        mysqli_close($db);
    }
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