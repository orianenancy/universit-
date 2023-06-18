<?php  require 'connect.php'; ?>

// <?php 

// if(isset($_POST)) {
//     if (
//         isset($_POST['Nom']) && !empty($_POST['Nom']) 
//         && isset($_POST['Prenom']) && !empty($_POST['Prenom']) 
//         && isset($_POST['date']) && !empty($_POST['date']) 
//         && isset($_POST['Email']) && !empty($_POST['Email']) 
//         && isset($_POST['Contact']) && !empty($_POST['Contact']) 
//         && isset($_POST['Adresse']) && !empty($_POST['Adresse']) 
//         && isset($_POST['pays']) && !empty($_POST['pays']) )
//         {
//         $Nom = $_POST['Nom'];
//         $Prenom = $_POST['Prenom'];



//         $date =$_POST['date'];
//         $Email = $_POST['Email'];
//         // $sexe = $_POST['sexe'];
//         $Contact = $_POST['Contact'];
//         $Adresse = $_POST['Adresse'];
//         $Nationnalite =$_POST['pays'];
//         // $Prepa = $_POST['Prepa'];
//         // $Niveau = $_POST['Niveau'];
//         // $Nompere = $_POST['Nompere'];
//         // $Contactpere = $_POST['Contactpere'];
//         // $Nommere = $_POST['Nommere'];
//         // $Contactmere = $_POST['Contactmere'];
        // $query = "INSERT INTO inscripcion VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";


//     }
// }
// ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription d'Administrateur    </title>
    <link rel="stylesheet" href="./inscritadmi.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
        <h1>Inscription d'un Elève</h1>
        <fieldset class="fiel1">
            <legend>INFORMATION PERSONNELLE</legend>
            <section class="grand">

                    <form method="post" action="">
                        <div class="perso1">
                            <div class="label">
                                <label for="nom">Nom </label>
                                <input type="text" id="nom" name="Nom" placeholder="Entrez votre nom" class="inp">
                            </div>
                            <div class="label">
                                <label for="prenom">Prenom </label>
                                <input type="text" id="prenom" name="Prenom" placeholder="Entrez votre prenom" class="inp">
                            </div>
                            <div class="label">
                                <label for="date">Date de naissance </label>
                                <input type="date" id="date" name="date" placeholder="jj/mm/aaaa" class="inp">
                            </div>
                            <div class="label">
                                <label for="email" >Email </label>
                                <input type="mail" id="mail" name="Email" placeholder="abc@gmail.com" class="inp">
                            </div>
                        </div>
                        <div class="perso2">
                            <div class="label">
                                <label for="contact" >Contact</label>
                                <input type="text" id="contact" name="Contact" class="inp">
                            </div>
                            <div class="label">
                                <label for="adresse" >Adresse</label>
                                <input type="text" id="adresse" name="Adresse" class="inp">
                            </div>
                            <div class="label">
                                <label for="pays">Nationnalité </label>
                                <input type="text" id="pays" name="pays" class="inp">
                            </div>
                        </div>
                        <div>
                            <button type="submit">Envoyer</button>
                        </div>
                    </form>
            </section>
        </fieldset>

        
    
</body>
</html>