<?php 
    session_start();
    require 'connect.php'; 
?>
<?php
// session_start();
if(isset($_POST['login'])){
    if(!empty($_POST['nom']) AND !empty($_POST['mdp'])){
        $nom = htmlspecialchars($_POST['nom']);
        $mdp = ($_POST['mdp']);

        $recupUser = $conn->prepare('SELECT * FROM admin WHERE nom = ? AND pwd = ?');
        $recupUser ->execute(array($nom ,$mdp));
        $user=$recupUser->fetchAll();

        if ($recupUser->rowCount() >0){
            $_SESSION['admin'] = $user;
            header('Location:tableaudebord/index.php');
        }else{
            $Erreur = "Il y a un problème sur l'une de vos information";
        }

    }else{
        $Erreur="Veuillez entrer tous les champs ...";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="./connecter.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    <form method="post" action="" >
        <h1>Connexion</h1>
        <?php 
            if (isset($Erreur)) {
                echo "<p class='Erreur'>".$Erreur."</p>";
            }
        ?>
        <div>
            <label for="nom">Nom d'utilisateur</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez un nom" autocomplete="off">
        </div> 
        <div>
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp" name="mdp" placeholder="Entrez un mot de passe" autocomplete="off">
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
    </form>
</body>
</html>