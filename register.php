<?php

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$hashed_password = password_hash(($_POST['password']),PASSWORD_DEFAULT);
$pattern = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !"#$%&\'()*+,-.\/:;<=>?@\[\\\\\]^_`{|}~]{8,255}/';
$servname = 'localhost';
$dbname = 'account';
$dbuser = 'root';
$pass = '';
$sql = "INSERT INTO user (pseudo, password) VALUES('$pseudo', '$hashed_password')";
$serv = "http://phpexoformulairepdo/";


try {
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $dbuser, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
    $verifPs = $dbco->prepare("SELECT * FROM user WHERE pseudo = ?");
    $verifPs->execute(array($pseudo));
    $verifPseudo = $verifPs->fetchAll();


if ($verifPseudo){
    $serv .= "?erreur3";
    header('Location:'.$serv );
    
}elseif(!preg_match($pattern,$password)){
    $serv .= "?erreur2";
    header('Location:'.$serv );

}elseif(empty($pseudo) || empty($password)) {
    $serv .= "?erreur1";
    header('Location:'.$serv );
}
else{
    $dbco->exec($sql);
    $serv .= "?valide";
    header('Location:'.$serv );}

   



