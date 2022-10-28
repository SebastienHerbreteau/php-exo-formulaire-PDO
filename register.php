<?php
session_start();
include 'dbco.php';
$pseudo = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars($_POST['password']);
$hashed_password = password_hash(($_POST['password']),PASSWORD_DEFAULT);
$pattern = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !"#$%&\'()*+,-.\/:;<=>?@\[\\\\\]^_`{|}~]{8,255}/';
$sql = "INSERT INTO user (pseudo, password, role) VALUES('$pseudo', '$hashed_password', 'subscriber')";
$index = "http://phpexoformulairepdo/";
$dashboard = "http://phpexoformulairepdo/dashboard.php";

    $verifPs = $dbco->prepare("SELECT * FROM user WHERE pseudo = ?");
    $verifPs->execute(array($pseudo));
    $verifPseudo = $verifPs->fetchAll();


if ($verifPseudo){
    $index .= "?erreur3";
    header('Location:'.$index );
    
}elseif(!preg_match($pattern,$password)){
    $index .= "?erreur2";
    header('Location:'.$index );

}elseif(empty($pseudo) || empty($password)) {
    $index .= "?erreur1";
    header('Location:'.$index );
}
else{
    $dbco->exec($sql);
    $dashboard .= "?valide";
    $_SESSION['user'] = $pseudo;
    header('Location:'.$dashboard );}

   



