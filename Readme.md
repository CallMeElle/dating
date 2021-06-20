# Hinweise zum arbeiten am Projekt

## Header und Footer

Bitte genau so in jedes Dokument übernehmen. Der andere php code wird dazwischen geschrieben.

```php
<html>
    <?php
        echo file_get_contents("html/header.html");
    ?>
    <body>
        
        <?php
            include_once "html/leiste.php";
        ?> 
        
        //...weiteres html
```

```php
<?php  
    $foot_file = file_get_contents("html/foot.html");
    echo $foot_file;
?>
```

## Um im php-Dukument eine Verbindung mit der Datenbank aufzubauen:

Ganz oben nach öffnen des php-tags: 

```php
include_once "Funktionen/mysql_connect.php";
```

unmittelbar vor Verbindung (zum Daten abfragen oder um etwas neu hinzuzufügen:

```php
$db = connectDB();
```

Der Zugriff funktioniert am Besten so (Beispielhaft mit `NUtzernummer, Passwort und Username`:

```php
$stmt1 = mysqli_prepare($db, "SELECT Nutzernummer, Passwort FROM Nutzer WHERE Username = ?");
            
            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt1, "s", $Username); //falls mehrere Parameter in Variable gebunden werden müssen: ($stmt1, "sss", $Username, $anderes, $drittes);

            /* execute query */
            mysqli_stmt_execute($stmt1);
            
            mysqli_stmt_bind_result($stmt1, $Nutzernummer, $pwd);
            mysqli_stmt_fetch($stmt1);
```

Nach Zugriff, den Zugang direkt wieder schließen:

```php
mysqli_close($db);
```

## Session

Um zu überprüfen, dass der Nutzer schon eingeloggt ist:
(Das muss vor jeglichem html code eingefügt werden, sonst funktioniert es nicht.)

```php
<?php
    include_once "Funktionen/main.php";
    ensureLogin();
?>









