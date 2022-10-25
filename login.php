<?php
session_start();

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$servname = 'localhost';
$dbname = 'account';
$dbuser = 'root';
$pass = '';
$serv = "http://phpexoformulairepdo/";
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $dbuser, $pass);



if(isset($_POST['connexion'])){
    if(!empty($pseudo) AND !empty($password))
    {
        $user = $dbco->prepare("SELECT * FROM user WHERE pseudo = ? AND password = ?");
        $user->execute(array($pseudo, $password));
        $verifUser = $user->fetchAll();

        $verifPs = $dbco->prepare("SELECT * FROM user WHERE pseudo = ?");
        $verifPs->execute(array($pseudo));
        $verifPseudo = $verifPs->fetchAll();
        
        $verifPas = $dbco->prepare("SELECT password FROM user WHERE pseudo = ?");
        $verifPas->execute(array($pseudo));
        $verifPassword = $verifPas->fetchAll();
        
        if(count($verifuser) < 0){
            $serv .= "?valideconnexion";
            header('Location:'.$serv );
        }elseif(!$verifPseudo){
            $serv .= "?erreurconnexion3";
            header('Location:'.$serv );
        }elseif($verifPassword){
            $serv .= "?erreurconnexion4";
            // var_dump($verifPassword);
            header('Location:'.$serv );
        }else{
            $serv .= "?erreurconnexion2";
            header('Location:'.$serv );
        }

    }else{
        $serv .= "?erreurconnexion1";
        header('Location:'.$serv );
    }
}