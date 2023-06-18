<?php  require 'connect.php';
session_start();
?>

<?php  
    if (isset($_GET['supprime'])){
        $supprime = $_GET['supprime'];
        $delete = $conn->prepare("DELETE FROM prof WHERE id_prof = ?");
        $delete ->execute([$supprime]);
    }

    if (isset($_GET['modifie'])){
        $modifie = $_GET['modifie'];
        $update = $conn->prepare("UPDATE prof SET id_prof = ?, nomprof = ?, prenom = ?, contact = ?, habit = ?, email = ?, nommatiere = ?" );
        $update ->execute([$modifie]);
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de Professeur</title>
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
            background-color: goldenrod;
        }

        .prof{
            
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
            border: 2px solid gold;
        }

        thead th{
            border-bottom: 1px solid gold;
        }

        thead tr{
            text-align: center;
            background-color: gold;
        }

        th, td {
            padding: 15px 20px;
            text-align: center;
        }

        h1{
            height: 33px;
        }

        div.nav{
            margin: 5% auto;
            height: 50px;
            width: 881.625px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0 12rem ;
            margin-bottom: 20px;
        }

    </style>
    <div class="ensemble">
        <div class="nav">
            <h1>Table des Professeurs</h1>
            <a href="./professeur.php" class="prof">Ajouter un nouveau Professeur</a>
        </div>
        <table>

            <thead>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Contact</th>
                <th>Lieu d'habitat</th>
                <th>Email</th>
                <th>Matière</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php

                    $result = "SELECT * FROM prof";
                    $sql = $conn->prepare($result);
                    $sql -> execute();
                    $result=$sql->fetchAll();
                    foreach ($result as $user) {
                ?>
                <tr>
                    <td><?php echo $user['nomprof'];?></td>
                    <td><?php echo $user['prenom'];?></td>
                    <td><?php echo $user['contact'];?></td>
                    <td><?php echo $user['habit'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['nommatiere'];?></td>
                    <td>
                        <a href="./professeur.php?modifie=<?php echo $user['id_prof'] ?>" class="bouton">Modifier</a>
                        <a href="tableprof.php?supprime=<?php echo $user['id_prof'] ?>" class="bouton">Supprimer</a>
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