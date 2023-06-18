<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        body {
            width: 100%;
        }
    </style>
</head>
<body>
    <img src="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png" width="80" height="80" alt="">
    <h1>Liste des Etudiants inscrit</h1>
    <table>
        <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Matricule</th>
            <th>Sexe</th>
            <th>Filière</th>
        </thead>

        <tbody>
            
    
            <tr>
                <td><?php echo $etu['nom'];?></td>
                <td><?php echo $etu['prenom'];?></td>
                <td><?php echo $etu['matricule'];?></td>
                <td><?php echo $etu['sexe'];?></td>
                <td><?php echo $etu['nomfiliere'];?></td>
            </tr>
            
            
        </tbody>
    </table>
    
    

    <?php ; ?>
</body>
</html>