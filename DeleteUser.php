<?php
session_start();
include 'dbco.php';
$pseudo = $_GET["supprimer"];

if(isset($pseudo));
    $suppr = $dbco->prepare("DELETE FROM user WHERE pseudo = ? ");
    $suppr->execute(array($pseudo));
    var_dump($pseudo);
    header('location:dashboard.php');

?>