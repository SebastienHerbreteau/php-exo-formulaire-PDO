<?php
session_start();

$pseudo = htmlspecialchars($_POST['pseudo']);
$password = $_POST['password'];
$hashed_password = password_hash(($_POST['password']),PASSWORD_DEFAULT);
$pattern = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !"#$%&\'()*+,-.\/:;<=>?@\[\\\\\]^_`{|}~]{8,255}/';
$servname = 'localhost';
$dbname = 'account';
$dbuser = 'root';
$pass = '';
$sql = "INSERT INTO user (pseudo, password) VALUES('$pseudo', '$hashed_password')";
$index = "http://phpexoformulairepdo/";
$dashboard = "http://phpexoformulairepdo/dashboard.php";


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

   



