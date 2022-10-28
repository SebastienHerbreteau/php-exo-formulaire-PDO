<?php
session_start();
include 'dbco.php';
?>
<link rel="stylesheet" href="main.css" />
<h1>Bonjour <?php echo $_SESSION['user']; ?></h1>
<?php 

if ( isset($_GET["valide"]) ){
    echo "Votre inscription a bien été prise en compte.<br>";
}
if (isset($_GET["valideconnexion"])){
    echo "Connexion réussie <br>"; 
}

if($_SESSION['user'] == 'admin'){
    $users = $dbco->query("SELECT pseudo,role,created_at,modified_at FROM user WHERE role = 'subscriber'");
    $user = $users->fetchAll();

    ?><table>
        <tr>
            <th>Pseudo</th>
            <th>Role</th>
            <th>Crée le</th>
            <th>Modifié le</th>
            <th>Action</th>
        </tr><?php
    for($i=0; $i<count($user); $i++){
        ?><tr>
            <td><?php echo $user[$i]["pseudo"]?></td>
            <td><?php echo $user[$i]["role"]?></td>
            <td><?php echo $user[$i]["created_at"]?></td>
            <td><?php echo $user[$i]["modified_at"]?></td>
            <td>
                <input type="hidden" class="user" name="supprimer" value="<?php echo $user[$i]["pseudo"]?>">
                <button class="supprimer" value="Supprimer">Supprimer</button>
            </td>
        </tr>
    <?php
    }
    ?></table><?php
}
?>
<a href="logout.php">Déconnexion</a>

<div class="alert"><p>Voulez-vous vraiment supprimer l'utilisateur</p>
    <div class="userAlert" name="supprimer"></div>
        <div class="container_bouton">
            <button class="non" >Non</button>
            <button class="Oui" >Oui</button>
        </div>
<div>

<script src="app.js"></script>