<?php  require 'connect.php';
session_start();
?>

<?php  
     if (isset($_GET['supprime'])){
        $supprime = $_GET['supprime'];
        $delete = $conn->prepare("DELETE FROM paiement WHERE codepaiement = ?");
        $delete ->execute([$supprime]);
    }

    if (isset($_GET['modifie'])){
        $modifie = $_GET['modifie'];
        $update = $conn->prepare("UPDATE paiement SET codepaiement = ?, nom = ?, prenom = ?, matricule = ?, versement = ?" );
        $update ->execute([$modifie]);
    }
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de paiement</title>
    <link rel="stylesheet" href="">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    <style>

        body {
            background-color: #ddd;         
        }

        a{
            text-decoration: none;
            background-color: black;
            color: #fff;
            padding: 5px;
            width: 100px;
            height: 30px;
        }
        a:hover{
            background-color: steelblue;
        }

        .paie{

            width: 200px;
            height: 20px;
        }

        .ensemble{
            display: flex;
            flex-direction: column;
        }

        table {
            border-collapse: collapse;
            min-width: 500px;
            width: auto;
            box-shadow: 0 5px 50px rgba(0, 0, 0, 0.10);
            margin: auto;
            background-color: aliceblue;
            border: 2px solid salmon;
        }

        thead th{
            border-bottom: 1px solid salmon;
            background-color: salmon;
        }

        thead tr{
            text-align: left;
        }

        th, td {
            padding: 15px 35px;
        }

        h1{
            height: 33px;
        }

        div.nav{
            margin: 5% auto;
            height: 50px;
            width: 730.625px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0 12rem ;
            margin-bottom: 20px;
        }

    </style>
    <div class="ensemble">
        <div class="nav">
            <h1>Table des Paiements</h1>
            <a href="./paiement.php" class="paie">Ajouter un nouveau Paiement</a>
        </div>
        <table>
            <thead>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Maticule</th>
                <th>Versement</th>
                <th>code de paiement</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php

                    $result = "SELECT * FROM paiement";
                    $sql = $conn->prepare($result);
                    $sql -> execute();
                    $result=$sql->fetchAll();
                    foreach ($result as $user) {
                ?>
                <tr>
                    <td><?php echo $user['nom'];?></td>
                    <td><?php echo $user['prenom'];?></td>
                    <td><?php echo $user['matricule'];?></td>
                    <td><?php echo $user['versement'];?></td>
                    <td><?php echo $user['codepaiement'];?></td>
                    <td>
                        <a href="./paiement.php?modifie=<?php echo $user['codepaiement'] ?>" class="bouton">Modifier</a>
                        <a href="tablepaiement.php?supprime=<?php echo $user['codepaiement'] ?>" class="bouton">Supprimer</a>
                    </td>
                </tr>
                    
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>