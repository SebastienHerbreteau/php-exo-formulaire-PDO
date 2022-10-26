<?php
session_start();
?>


<h1>Bonjour <?php echo $_SESSION['user']; ?></h1>
<?php 
if ( isset($_GET["valide"]) ){
    echo "Votre inscription a bien été prise en compte.<br>";
}
if (isset($_GET["valideconnexion"])){
    echo "Connexion réussie <br>"; 
    }
?>
<a href="logout.php">Déconnexion</a>