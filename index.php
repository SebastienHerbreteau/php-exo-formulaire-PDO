
    <link rel="stylesheet" href="main.css" />


<h2>Inscription</h2>
<form method="POST" action="register.php">
    <input type="text" name="pseudo">
    <input type="password" name="password">
    <input type="submit" name="inscription">
</form>

<?php
if ( isset($_GET["erreur1"]) ){
    echo "Veuillez remplir tout les champs";
}

if (isset($_GET["erreur2"])){
    echo "Votre mot de passe doit contenir 8 caractères minimum, 1 majuscule, 1 majuscule et 1 chiffre.";
}

if ( isset($_GET["erreur3"]) ){
    echo "Ce pseudo existe déjà";
}

if (isset($_GET["valide"])){
    echo "Votre inscription a bien été prise en compte.";
}
?>

<h2>Connexion</h2>
<form method="POST" action="login.php">
    <input type="text" name="pseudo">
    <input type="password" name="password">
    <input type="submit" name="connexion">
</form>

<?php
if ( isset($_GET["erreurconnexion1"]) ){
    echo "Veuillez remplir tout les champs";
}

if (isset($_GET["erreurconnexion2"])){
    echo "Identifiants incorrects";
}

if (isset($_GET["erreurconnexion3"])){
    echo "Ce pseudo n'existe pas";
    
}

if (isset($_GET["erreurconnexion4"])){
    echo "Mot de passe incorrect";
    
}

if (isset($_GET["valideconnexion"])){
    echo "Connexion réussie";
    
}


?>