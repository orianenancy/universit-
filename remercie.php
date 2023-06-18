<?php  
session_start();
require 'connect.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: darkcyan;
        }
        a{
            text-decoration: none;
            background-color: darkgoldenrod;
            color: #fff;
            height: 30px;
            padding: 15px 20px;
            font-size: 20px;
        }

        a:hover{
            color: black;
            background-color: #fff;
        }

        div{
            margin: 10% auto;
            text-align: center;
        }
    </style>
    <div>
        <h1>Votre demande a été éffectuer avec succès</h1>
        
        <a href="./tableaudebord/index.php">Retour au tableau de bord</a>
        <a href="./dompdf.php">Imprimer</a>
    </div>
    
</body>
</html>