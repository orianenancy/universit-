<?php  require 'connect.php'; 
session_start();
?>

<?php  
     if (isset($_GET['supprime'])){
        $supprime = $_GET['supprime'];
        $delete = $conn->prepare("DELETE FROM note WHERE id_note = ?");
        $delete ->execute([$supprime]);
    }

    if (isset($_GET['modifie'])){
        $modifie = $_GET['modifie'];
        $req = "SELECT * FROM note WHERE id_note = ?";
        $prepa1 = $conn->prepare($req);
        $prepa1->execute([$modifie]);
        $note = $prepa1->fetch();


        $req1 = "UPDATE note SET id_note = ?, nomeleve = ?, matricule = ?, nomfiliere = ?, nommatiere = ?, nomprof = ?, note = ?, typenote = ? WHERE id_note = ?";
        $update = $conn->prepare($req1);
        $update ->execute([$modifie]);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Etudiants</title>
    
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>
    <style>

        

        a{
            text-decoration: none;
            background-color: #008ea1;
            color: #fff;
            padding: 5px;
            width: 100px;
            height: 30px;
        }
        a:hover{
            background-color: black;
        }

        a.bouton{
            background-color: aqua;
            color: black;
        }

        .note5{

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
            box-shadow: 0 5px 50px rgba(0, 0, 0, 0.3);
            margin: auto;
            background-color: aliceblue;
            border: 2px solid #008ea1;
            border-radius: 20px;
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
            <h1>Mes Notes</h1>
            <a href="./note.php" class="note5">Ajouter une nouvelle Note </a>
        </div>
        <table>
            <thead>
                <th>Nom</th>
                <th>Matricule</th>
                <th>Nom de Matière</th>
                <th>Nom du Professeur</th>
                <th>Note</th>
                <th>Type de Note</th>
                <th>Action</th>
                
            </thead>
            <tbody>
                <?php

                    $result = "SELECT * FROM note";
                    $sql = $conn->prepare($result);
                    $sql -> execute();
                    $result=$sql->fetchAll();
                    foreach ($result as $user) {
                ?>
                <tr>
                    
                    <td><?php echo $user['nomeleve'];?></td>
                    <td><?php echo $user['matricule'];?></td>
                    <td><?php echo $user['nommatiere'];?></td>
                    <td><?php echo $user['nomprof'];?></td>
                    <td><?php echo $user['note'];?></td>
                    <td><?php echo $user['typenote'];?></td>
                    <td>
                        <a href="./modifienote.php?modifie= <?php echo $user['id_note'] ?>" class="bouton">Modifier</a>
                        <a href="tablenoteadmin.php?supprime=<?php echo $user['id_note'] ?>" class="bouton">Supprimer</a>
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