<?php  require 'connect.php';
session_start();
 ?>

<?php
    if (isset($_POST ['valide'])) {
        if (
            !empty($_POST['nom'])
            && !empty($_POST['prenom'])
            && !empty($_POST['versement'])
            && !empty($_POST['matricule'])
            
            ){
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $matricule = htmlspecialchars($_POST['matricule']);
                $versement = htmlspecialchars($_POST['versement']);
                $codepaiement = substr($nom,0,3) . substr($matricule,3,5) . substr($prenom,0,2);
                
    
                $requete = "INSERT INTO paiement VALUES(?,?,?,?,?)";
                $sql = $conn->prepare($requete);
                $sql->execute([$codepaiement, $nom, $prenom,  $matricule, $versement ]);

                header("Location:remerciement.php");
            }
            else{
                echo("Veuillez remplir tous les champs!!!!!!");
            }
     }
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet"  href="./paiement.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    
    <form method="post" action="" >
        <h1>Paiement</h1>
        
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom"  placeholder="Entrer votre nom ">
        </div>

        <div>
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrer votre prénom">
        </div>

        <div>
            <label for="prenom">Matricule</label>
            <input type="text" id="matricule" name="matricule" placeholder="Entrer votre matricule">
        </div>
        
        <div >
            <label for="versement">Versement :</label>
            <select name="versement" id="versement">
                <option value="Non payer">Non payer</option>
                <option value="250000">1re : 250.000fr</option>
                <option value="300000">2ème : 300.000fr</option>
                <option value="Totalité">La Totalité</option>
                
            </select>
        </div>

        <div>
            <input type="submit" name="valide" value="Valider" class="valid">
            
        </div>
        
    </form>
</body>
</html>