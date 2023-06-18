<?php  require 'connect.php'; 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Notes</title>
    <link rel="stylesheet" href="./espaceetudiant.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    <style>

        

         /* a.bb{
            text-decoration: none;
            background-color: #008ea1;
            color: #fff;
            padding: 5px;
            width: 100px;
             height: 30px; 
        } */
        /* a:hover{
            background-color: black;
        } */

        .note1{
            text-decoration: none;
            font-size: 20px;
            color: black;
            padding: 5px;
        }

        .ensemble{
            display: flex;
            flex-direction: column;
        }

        table {
            border-collapse: collapse;
            min-width: 500px;
            width: auto;
            box-shadow: 0 5px 50px rgba(0, 0, 0, 0.3);
            margin: auto;
            background-color: aliceblue;
            border: 2px solid #008ea1;
        }

        thead th{
            border-bottom: 1px solid #008ea1;
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

        nav div a.note1{
            color: white;
            background-color: #008ea1;
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

    <nav>
        <div class="logo">
            <img src="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png" alt="">
        </div>
        <div class="liste">
            <a href="./espaceetudiant.php" class="bb">Acceuil</a>
            <a href="" class="bb">Matières</a>
            <a href="tablenote.php" class="note1">Mes Notes</a>
        </div>
        
    </nav>
    <hr>

    <div class="ensemble">
        <div class="nav">
            <h1>Mes Notes</h1>
        </div>
        <table>
            <thead>
                <th>Nom de Matière</th>
                <th>Nom du Professeur</th>
                <th>Note</th>
                <th>Type de Note</th>
                
            </thead>
            <tbody>
                <?php

                    $id = $_SESSION['inscription']['matricule'];
                    
                     $result= "SELECT n.* FROM note n ,inscription i WHERE n.matricule = i.matricule AND i.matricule = ?";

                    // $result = "SELECT  n.nommatiere, n.nomprof, n.note, n.typenote  
                    // FROM matiere m, prof p ,note n, inscription i, filiere f
                    // WHERE n.nommatiere = m.nommatiere AND n.nomprof = p.nomprof AND n.matricule = i.matricule AND n.nomfiliere = f.nomfiliere AND i.matricule = ?;";
                    $sql = $conn->prepare($result);
                    $sql -> execute([$id]);
                    $result=$sql->fetchAll();
                    foreach ($result as $user) {
                ?>
                <tr>
                    
                    <td><?php echo $user['nommatiere'];?></td>
                    <td><?php echo $user['nomprof'];?></td>
                    <td><?php echo $user['note'];?></td>
                    <td><?php echo $user['typenote'];?></td>
                    
                </tr>
                    
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>