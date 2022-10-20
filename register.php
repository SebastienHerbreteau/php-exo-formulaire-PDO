<?php

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$servname = 'localhost';
$dbname = 'account';
$user = 'root';
$pass = '';


try {
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Entrée ajoutée dans la table';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


if (empty($pseudo) || empty($password)) {
    header("Location : index.php");
} else {
    $sql = "INSERT INTO user (pseudo, password)
    VALUES('$pseudo', '$password')";
    $dbco->exec($sql);
}
