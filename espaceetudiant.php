<?php
session_start();
require 'connect.php';



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace etudiant</title>
    <link rel="stylesheet" href="./espaceetudiant.css">
    <link rel="icon" href="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png">
</head>
<body>

    <style>
        .note3{
            text-decoration: none;
            font-size: 20px;
            color: black;
            padding: 5px;
        }
        .note3{
            color: white;
            background-color: #008ea1;
        }
    </style>

    <nav>
        <div class="logo">
            <img src="./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png" alt="">
        </div>
        <div class="liste">
            <a href="./espaceetudiant.php" class="note3">Acceuil</a>
            <a href="" class="bb">Matières</a>
            <a href="tablenote.php" class="bb">Mes Notes</a>
        </div>
    </nav>
    

    <div>
        <p>Bienvenu dans votre Espace Etudiant <?php echo($_SESSION['inscription']['nom']) ?></p>
        <img src="./Logo/s'organiser quand on est étudiant_1607939406.jpg" alt="" class="grand">
    </div>

</body>
</html>