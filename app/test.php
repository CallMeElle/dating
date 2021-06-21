<?php
    $password = "12345";
    $passwort_hash = password_hash($password, PASSWORD_DEFAULT);
    echo phpversion();
    echo "<br>";   
    echo $passwort_hash; 
    echo "<br>";
    if (password_verify($paasword, $passwort_hash)) {
        echo "Password correct";
    } else {
        echo 'Invalid password.';
    }
    echo "<br>";
    if (password_verify($password, $passwort_hash)) {
        echo "Password correct";
    } else {
        echo 'Invalid password.';
    }
    echo "<br>";
    echo password_verify($password, $passwort_hash);

    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
 
    // See the password_hash() example to see where this came from.
$password = 'pass1234567890';
$hash = '$2y$10$JLP/pPei6RYRdUmoH8H5RO7iJyImOtrBLsrRRfq3XpeqNE3lQ/l7O';

$hash2 = '$2y$10$gMJKYZUc1FKSZBnsONxLOebOHj.uuEWSiCP0jo4Zv0iAHBz6iz.NG';

if (password_verify('pass1234567890', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

echo "<br>";

if (password_verify('pass1234567890', $hash2)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>