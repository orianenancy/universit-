<?php  require 'connect.php';
session_start(); 
?>

<?php
    if (isset($_POST ['valide'])) {
        if (
            !empty($_POST['nomprof'])
            && !empty($_POST['prenom'])
            && !empty($_POST['contact'])
            && !empty($_POST['habit'])
            && !empty($_POST['email'])
            && !empty($_POST['nommatiere'])
            ){
                $nomprof = htmlspecialchars($_POST['nomprof']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $contact = htmlspecialchars($_POST['contact']);
                $habit = htmlspecialchars($_POST['habit']);
                $email = htmlspecialchars($_POST['email']);
                $nommatiere = htmlspecialchars($_POST['nommatiere']);
                
    
                $requete = "INSERT INTO prof (nomprof, prenom, contact, habit, email, nommatiere) VALUES(?,?,?,?,?,?)";
                $sql = $conn->prepare($requete);
                $sql->execute([$nomprof, $prenom,  $contact, $habit, $email, $nommatiere]);

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
    <title>Professeur</title>
    <link rel="stylesheet"  href="./prof.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    
    
    <form method="post" action="" >
        <h1>Inscription Professeur</h1>
        <div class="grand">
            <div>
                <label for="nomprof">Nom</label>
                <input type="text" id="nomprof" name="nomprof"  placeholder="Entrer votre nom ">
            </div>

            <div>
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrer votre prénom">
            </div>

            <div>
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" placeholder="Entrer votre contact">
            </div>

            <div >
                <label for="habit">Lieu d'habitat</label>
                <input type="text" id="habit" name="habit" >          
            </div>

            <div >
                <label for="email">Email</label>
                <input type="email" id="email" name="email" >          
            </div>

            <div >
                <label for="nommatiere">Matière</label>
                <input type="text" id="nommatiere" name="nommatiere" >          
            </div>

            <div>
                <input type="submit" name="valide" value="Valider" class="valid">

            </div>
        </div>
        
        
    </form>
</body>
</html>