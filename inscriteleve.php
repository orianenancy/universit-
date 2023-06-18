
<?php
session_start();
require_once('connect.php');
if (isset($_POST ['valider'])) {
    if (
        !empty($_POST['nom'])
        && !empty($_POST['prenom'])
        && !empty($_POST['email'])
        && !empty($_POST['sexe'])
        && !empty($_POST['matricule'])
        && !empty($_POST['date'])
        && !empty($_POST['lieu'])
        && !empty($_POST['nationnalite'])
        && !empty($_POST['contact'])
        && !empty($_POST['prepa'])
        && !empty($_POST['paiement'])
        && !empty($_POST['nompere'])
        && !empty($_POST['contactpere'])
        && !empty($_POST['nommere'])
        && !empty($_POST['contactmere'])
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $matricule = htmlspecialchars($_POST['matricule']);
            $date = htmlspecialchars($_POST['date']);
            $lieu = htmlspecialchars($_POST['lieu']);
            $nationnalite = htmlspecialchars($_POST['nationnalite']);
            $contact = htmlspecialchars($_POST['contact']);
            $prepa = htmlspecialchars($_POST['prepa']);
            $paiement = htmlspecialchars($_POST['paiement']);
            $nompere = htmlspecialchars($_POST['nompere']);
            $contactpere = htmlspecialchars($_POST['contactpere']);
            $nommere = htmlspecialchars($_POST['nommere']);
            $contactmere = htmlspecialchars($_POST['contactmere']);
            $pwd = substr($sexe,0,1). substr($nom,0,2) . substr($matricule,0,4) . substr($prenom,0,2) . substr($contact,0,2) ;

            $requete = "INSERT INTO inscription VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $sql = $conn->prepare($requete);
            $sql->execute([$nom, $prenom, $email, $sexe, $matricule, $pwd, $date, $lieu, $nationnalite, $contact, $prepa, $paiement, $nompere, $contactpere, $nommere, $contactmere ]);
       
            $message = "Nom : ".$nom."  et passe : ".$pwd;

            header("Location:remercie.php");
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
    <title>Inscription</title>
    <link rel="stylesheet"  href="./inscriteleve.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    
    <h1>INSCRIPTION D'UN ELEVE</h1>
    <form method="post" action="" >
        
        <fieldset class="perso">
            <legend>Information Personnelle</legend>
            <div class="grand">
                

                <div class="label">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" >
                </div>

                <div class="label">
                    <label for="prenom">Prenom :</label>
                    <input type="text" id="prenom" name="prenom" >
                </div>

                <div class="label">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" >
                </div>

                <div class="sex">
                    <label for="sexe">Sexe :</label>
                    <div class="sex1">
                        <div>
                            <input type="radio" id="sexe" name="sexe" value="Féminin">
                            <label for="sexe">Féminin</label>
                        </div>
                        <div>
                            <input type="radio" id="sexe" name="sexe" value="Masculin">
                            <label for="sexe" >Masculin</label>
                        </div>
                    </div>

                </div>

                <div class="label">
                    <label for="matricule">Matricule :</label>
                    <input type="text" id="matricule" name="matricule" >
                </div>

                <div class="label">
                    <label for="date">Date de naissance :</label>
                    <input type="date" id="date" name="date" >
                </div>

                <div class="label">
                    <label for="lieu">Lieu de naissance :</label>
                    <input type="text" id="lieu" name="lieu" >
                </div>

                <div class="label">
                    <label for="nationnalite">Nationnalité :</label>
                    <input type="text" id="nationnalite" name="nationnalite" >
                </div>

                <div class="label"  >
                    <label for="contact">Contact :</label>
                    <input type="tel" id="contact" name="contact" >
                </div>

                <div class="label">
                    <label for="prepa">Prépa :</label>
                    <select name="prepa" id="prepa">
                        <option value="1"></option>
                        <option value="BCPST">BCPST</option>
                        <option value="PCSI">PCSI</option>
                        <option value="MP2I">MP2I</option>
                        <option value="MPSI">MPSI</option>
                        <option value="PTSI">PTSI</option>
                        <option value="TSI">TSI</option>
                        <option value="PSI">PSI</option>
                        <option value="PSI">PSI</option>
                    </select>
                </div>

                <div class="label">
                    <label for="paiement">Code de Paiement :</label>
                    <input type="text" id="paiement" name="paiement" >
                </div>

            </div>
        </fieldset>

        <fieldset class="autre">
                <legend>Autre information</legend>
                <div class="parent">
                    <div class="prt">
                        <div>
                            <label for="nompere">Nom du père :</label>
                            <input type="text" id="nompere" name="nompere" >
                        </div>

                        <div>
                            <label for="contactpere">Contact du père :</label>
                            <input type="tel" id="contactpere" name="contactpere">
                        </div>
                    </div>

                    <div class="prt">
                        <div>
                            <label for="nommere">Nom de la mère :</label>
                            <input type="text" id="nommere" name="nommere" >
                        </div>

                        <div>
                            <label for="contactmere">Contact de la mère :</label>
                            <input type="tel" id="contactmere" name="contactmere">
                        </div>
                    </div>
                </div>
                

            </fieldset>

            
            <input type="submit" name="valider" value="Valider" class="bouton">
        
        
        
    </form>
</body>
</html>