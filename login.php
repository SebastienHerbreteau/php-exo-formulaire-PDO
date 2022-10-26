<?php
session_start();



$pseudo = htmlspecialchars($_POST['pseudo']);
$password = $_POST['password'];
$servname = 'localhost';
$dbname = 'account';
$dbuser = 'root';
$pass = '';
$index = "http://phpexoformulairepdo/";
$dashboard = "http://phpexoformulairepdo/dashboard.php";
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $dbuser, $pass);

if(isset($_POST['connexion'])){
    if(!empty($pseudo) AND !empty($password))
    {
     
        $verifPs = $dbco->prepare("SELECT * FROM user WHERE pseudo = ?");
        $verifPs->execute(array($pseudo));
        $verifPseudo = $verifPs->fetchAll(); 
        
        $verifPas = $dbco->prepare("SELECT password FROM user WHERE pseudo = ?");
        $verifPas->execute(array($pseudo));
        $verifPassword = $verifPas->fetchAll();

        if($verifPs->rowCount() == 1 AND password_verify($password,$verifPassword[0]["password"]) ){ 
            $dashboard .= "?valideconnexion";
            $_SESSION['user'] = $pseudo;
            header('Location:'.$dashboard);
        }elseif(!$verifPseudo){
            $index .= "?erreurconnexion3";
            header('Location:'.$index );
        }elseif(!password_verify($password,$verifPassword[0]["password"])){
            $index .= "?erreurconnexion4";
            header('Location:'.$index );
        }else{
            $index .= "?erreurconnexion2";
            header('Location:'.$index );
        }

    }else{
        $index .= "?erreurconnexion1";
        header('Location:'.$index );
    }
}