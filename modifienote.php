<?php 

    session_start();
    require_once('./connect.php');

    $id = $_GET['modifie'];

    $req = "SELECT * FROM note WHERE id_note = ? ";
    $prep = $conn->prepare($req);
    $prep->execute(array($id));

    $note = $prep->fetch();

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
            <input type="hidden" name="id" value="<?php echo($id); ?>">
        
            <h1>RELEVE DE NOTE</h1>
            
                <label for="nom">Nom de l'élève </label>
                <input type="text" id="nom" name="nom" value="<?php echo($note['nomeleve']); ?>">
            </div>

            <div>
                <label for="matricule">Matricule </label>
                <input type="text" id="matricule" name="matricule" value="<?php echo($note['matricule']); ?>">
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
                <input type="text" id="nomprof" name="nomprof" value="<?php echo($note['nomprof']); ?>">
            </div>

            <div>
                <label for="note">Note </label>
                <input type="tel" id="note" name="note" value="<?php echo($note['note']); ?>">
            </div>

            <div >
                <label for="type">Type de Note </label>
                <?php
                    $select= $note['typenote'];
                    echo("
                        <select name='type' id='type'>
                            <option value='2'".($select== '2' ? 'selected':'' ).">Projet </option>
                            <option value='3'".($select== '3' ? 'selected':'' ).">Devoir</option>
                            <option value='4'".($select== '4' ? 'selected':'' ).">Interrogation</option>
                            <option value='5'".($select== '5' ? 'selected':'' ).">Participation</option>
                        </select>
                    ");
                ?>
            </div>

            <div>
                <input type="submit" name="enregistre" value="Enregistrer">
            </div>
        
        

        
    </form>
</body>
</html>