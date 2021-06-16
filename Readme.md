# Hinweise zum arbeiten am Projekt

## Header und Footer

Bitte genau so in jedes Dokument übernehmen. Der andere php code wird dazwischen geschrieben.

```php
<?php
    $head_file = file_get_contents("html/head.html");
    echo $head_file;
?>
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
            mysqli_stmt_bind_param($stmt1, "s", $Username);

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

Um zu überprüfen ob der Nutzer angemeldet ist (und auf den Teil der Website Zugriff haben sollte)

Am Angang des Dokuments (nach php-tag):

```php
include_once "Funktionen/session.php";

```

So wird die Funktion aufgerufen:

```php

check_session()
```
 Wenn der Nutzer angemeldet ist wird `true` zurückgegeben.
 
## Account management

Für Account management (login, signup und überprüfen, ob nutzer existiert) muss diese Datei eingebunden werden:

```php
include_once "Funktionen/account_management.php";
```

Login und signup sind voneinander getrennt.

Signup funktioniert über die gleichnamige php-Seite. 
Dafür wird diese Funktion aufgerufen:

```php
register($Username, $Passwort, $Email)
```
Falls ein Fehler auftritt, wird `true` zurückgegeben


Um zu überprüfen, ob ein Username schon in der Datenbank existiert, gibt es diese Funktion:

```php
does_user_exist ($Username)
```
Falls es den Usernamen schon in der Datenbank gibt oder ein Fehler auftritt, wird `true` zurückgegeben.









