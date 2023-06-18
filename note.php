<?php  require 'connect.php'; 
session_start();
?>


<?php
    if (isset($_POST ['enregistre'])) {
        if (
            !empty($_POST['nom'])
            && !empty($_POST['matricule'])
            && !empty($_POST['prepa'])
            && !empty($_POST['matiere'])
            && !empty($_POST['nomprof'])
            && !empty($_POST['note'])
            && !empty($_POST['type'])
            
            ){
                $nom = htmlspecialchars($_POST['nom']);
                $matricule = htmlspecialchars($_POST['matricule']);
                $prepa = htmlspecialchars($_POST['prepa']);
                $matiere = htmlspecialchars($_POST['matiere']);
                $nomprof = htmlspecialchars($_POST['nomprof']);
                $note = htmlspecialchars($_POST['note']);
                $type = htmlspecialchars($_POST['type']);
                
                
    
                $requete = "INSERT INTO note VALUES(?,?,?,?,?,?,?,?)";
                $sql = $conn->prepare($requete);
                $sql->execute([NULL ,$nom,  $matricule,  $prepa, $matiere, $nomprof, $note, $type ]);

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
    <title>Note</title>
    <link rel="stylesheet" href="./note.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    <form method="post" action="">
        
            <h1>RELEVE DE NOTE</h1>
            
                <label for="nom">Nom de l'élève </label>
                <input type="text" id="nom" name="nom">
            </div>

            <div>
                <label for="matricule">Matricule </label>
                <input type="text" id="matricule" name="matricule">
            </div>

            <div >
                <label for="prepa">Filière </label>
                <select name="prepa" id="prepa">

                <?php
                    $filiere= $conn -> prepare("SELECT * FROM filiere");
                    $filiere -> execute();
                    $affiche  =$filiere -> fetchAll();
                    foreach($affiche as $fil) {
                ?>

                    <option value="<?php echo($fil['nomfiliere']) ?>"><?php echo($fil['nomfiliere']) ?></option>
                <?php } ?>
                </select>
                
            </div>

            <div>
                <label for="matiere">Matière </label>
                <select name="matiere" id="matiere">
                <?php
                    $matiere= $conn -> prepare("SELECT * FROM matiere");
                    $matiere -> execute();
                    $affiche  =$matiere -> fetchAll();
                    foreach($affiche as $matiere) {
                ?>
                    
                    <option value="<?php echo($matiere['nommatiere']) ?>"><?php echo($matiere['nommatiere']) ?></option>
                    
                    <?php } ?>
                </select>
                
            </div>

            <div>
                <label for="nomprof">Nom du professeur </label>
                <input type="text" id="nomprof" name="nomprof">
            </div>

            <div>
                <label for="note">Note </label>
                <input type="tel" id="note" name="note">
            </div>

            <div >
                <label for="type">Type de Note </label>
                <select name="type" id="type">
                    <option value="1"></option>
                    <option value="2">Projet</option>
                    <option value="3">Devoir</option>
                    <option value="4">Interrogation</option>
                    <option value="5">Participation</option>
                </select>
            </div>

            <div>
                <input type="submit" name="enregistre" value="Enregistrer">
            </div>
        
        

        
    </form>
</body>
</html>