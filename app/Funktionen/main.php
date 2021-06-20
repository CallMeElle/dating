<?php
  include_once "mysql_connect.php";
  function getLogin(){
    return $_SESSION['username'];
  }

  function ensureLogin() {
    session_start();
    if (session_id() == '' || !isset($_SESSION['username'])) {
        header("Location: index.php");
        die();
    }
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
    
        if(password_verify($password, $pwd)){
          return -1;
        }

        return $nutzernummer;

    }catch(mysqli_sql_exception $e){
        echo $e;
        mysqli_close($db);
    }
  }

      //rückgabewert true, wenn ein fehler passiert ist
      function register($Username, $Passwort, $Email){

        if(!isset($Username)){
            printJSDebug ("Username nicht gesetzt");
            return true;
        }

        if(!isset($Passwort)){
            printJSDebug ("Passwort nicht gesetzt");
            return true;
        }

        if(!isset($Email)){
            printJSDebug ("Email nicht gesetzt");
            return true;
        }

        $passwort_hash = password_hash($Password, PASSWORD_DEFAULT);
        //printJSDebug("Creating the session");
        try{

            $db = connectDB();
            $stmt = mysqli_prepare($db, "INSERT INTO Nutzer (Username, Passwort, Email) VALUES (?, ?, ?)");

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "sss", $Username, $passwort_hash, $Email);

            /* execute query */
            mysqli_stmt_execute($stmt);

            //checking if the user was created
            if(mysqli_stmt_affected_rows($stmt) != 1){
                printJSDebug("Nutzer nicht zur Datenbank hinzugefügt");

                mysqli_close($db);
                return true;
            }

            mysqli_close($db);

            //printJSDebug("Neuer Nutzer erstellt");

        }catch(mysqli_sql_exception $e){
            echo $e;
            mysqli_close($db);
            return true;
            //printJSDebug("$e");
        }

        return false;
    }

?>