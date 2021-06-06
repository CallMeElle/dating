<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

    <?php
        
        $credentials = parse_ini_file("../credentials.ini", true);
        $db = $credentials["db_bplaced"];

        $db_server = $db["host"];      	// DB-Server
        $db_user = $db["user"]; 			// DB- User in einer Variable speichern
        $db_pass = $db["passwort"]; 		// DB- Pass in einer Variable speichern 
        $db_name = $db["dbname"]; 		// DB- Name in einer Variable speichern
        
        $table_name = "Support"; 		// Tabellen- Name in einer Variable speichern
        $db = mysqli_connect($db_server, $db_user, $db_pass,$db_name); // Verbindung zur DB aufbauen
        
        $sql = "SELECT * FROM $table_name ORDER BY Mitarbeiternummer ASC"; // Unser SQL- Befehl
        $query = mysqli_query($db,$sql); 		// Wir stellen die Abfrage an die DB...
        
        if ( ! $query )
        {
            die('Ungültige Abfrage: ' . mysqli_error($db));
        }

        $num_rows = mysqli_num_rows($query); 	// Wir stellen fest wie viele Zeilen betroffen sind...
        
        //loading the html head file
        $head_file = file_get_contents("html/head.html");
        echo $head_file;
    
    ?>
    
    <body>
        <p>
            Es gibt <?php echo $num_rows; ?> Ergebnisse.<br>
        </p>
    
        <?php
            $i = 0;
            if ($num_rows > 0) { 			// Wenn wir Daten finden...
        
                $i=$i+1;
                
                while ($support = mysqli_fetch_array($query)) {  // siehe vorher: mysql_fetch_array liefert TRUE, dann
                                                                                    // wird Ergebnis in Variable gespeichert, sonst …
                    echo $i." – ".$support[0]." - ".$support[1]." - ".$support[2]."- ".$support[3]." ||| ".$support['M_Vorname']." - ".$support['M_Nachname']." - ".$support['Mitarbeiternummer']."- ".$support['Lohn']."<br>";  //Beispiel für beide Zugriffsarten
                }
            } else { 				// Bei Misserfolg
                echo "Keine Daten gefunden";
            }
        ?>
    
    </body>
    
    <?php
        mysqli_close($db);
    ?>
    
</html>
