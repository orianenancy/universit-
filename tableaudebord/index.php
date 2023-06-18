<?php 
session_start();
require  '../connect.php';


    $result = "SELECT * FROM inscription";
    $sql = $conn->prepare($result);
    $sql -> execute();
    $result=$sql->fetchAll();
    $nbretudiant = $sql->rowCount();

    // nombre de professeur
    $prof = $conn ->prepare("SELECT * FROM prof");
    $prof ->execute();
    $nbrprof = $prof ->rowCount();

    // nombre de filière
    $filiere = $conn ->prepare("SELECT * FROM filiere");
    $filiere ->execute();
    $nbrfiliere = $filiere ->rowCount();

    // nombre de paiement
    $paiement = $conn ->prepare("SELECT * FROM paiement");
    $paiement ->execute();
    $nbrpaiement = $paiement ->rowCount();

    // nombre de notes
    $note = $conn ->prepare("SELECT * FROM note");
    $note ->execute();
    $nbrnote = $note ->rowCount();

    if (isset($_GET['supprime'])){
        $supprime = $_GET['supprime'];
        $delete = $conn->prepare("DELETE FROM inscription WHERE matricule = ?");
        $delete ->execute([$supprime]);
    }

    if (isset($_GET['modifie'])){
        $modifie = $_GET['modifie'];
        $update = $conn->prepare("UPDATE inscription SET nom = ?, prenom = ?, email = ?, sexe = ?, matricule = ?, pwd = ?, naissance = ?, lieu = ?, nation = ?, contact = ?, nomfiliere = ?, codepaiement = ?, nompere = ?, contactpere = ?, nommere = ?, contactmere = ?" );
        $update ->execute([$modifie]);
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Panneau d'administration</title>
</head>

<body>
    <div class="lemenu">
        <div class="liste">
            <h1>Liste</h1>
        </div>
        <ul>
            <li><img src="./élève/page-daccueil.png " alt="">&nbsp; <span>Acceuil </span> </li> 
            <li><img src="./élève/etudiant.png" alt="">&nbsp;<span>Etudiants</span> </li>
            <li><img src="./élève/professeur.png" alt="">&nbsp;<span>Professeurs</span> </li>
            
            <li><img src="./élève/paiement-securise.png" alt="">&nbsp;<span>Paiement</span> </li>
            <li><img src="./élève/aide.png" alt="">&nbsp; <span>Aide</span></li>
            <li><img src="./élève/parametres-des-engrenages.png" alt="">&nbsp;<span>Paramètre</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="navbar">
            <div class="nav">
                <div class="recherche">
                    <input type="text" placeholder="Recherche...">
                    <button type="submit">
                        <img src="rechercher.png" alt=""></button>
                </div>
                <div class="decon">
                    <a href="../deconn.php" class="bouton">Déconnexion</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards" >
                <a href="" class="bloc">
                    <div class="card"> 
                        <div class="box">
                            <h1><?php echo $nbretudiant ?> </h1>
                            <h3>Etudiants</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./élève/etudiant.png" alt="">
                        </div>
                    </div>
                </a>
                
                <a href="../tableprof.php" class="bloc">
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $nbrprof ?></h1>
                            <h3>Professeurs</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./élève/professeur.png" alt="">
                        </div>
                    </div>
                </a>
                
                
                <a href="../tablefiliere.php" class="bloc">
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $nbrfiliere ?></h1>
                            <h3>Filière</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./élève/livre-ouvert.png" alt="">
                        </div>
                    </div>
                </a>
                
                <a href="../tablepaiement.php" class="bloc">
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $nbrpaiement ?></h1>
                            <h3>Paiements</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./élève/paiement-securise.png" alt="">
                        </div>
                    </div>
                </a>

                <a href="../tablenoteadmin.php" class="bloc">
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $nbrnote ?></h1>
                            <h3>Notes</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../icone/modifier.png" alt="">
                        </div>
                    </div>
                </a>
                
            </div>

            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Table des Etudiants</h2>
                        <a href="../inscriteleve.php" class="bouton">Inscription d'un nouvel étudiant</a>
                    </div>

                    <table>
                        <thead>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Maticule</th>
                            <th>Filière</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php
                            $result= 'SELECT * FROM inscription';
                            $sql = $conn->prepare($result);
                            $sql -> execute();
                            $result=$sql->fetchAll();
                            foreach ($result as $user) {
                            ?>
                            <tr>
                                <td><?php echo $user['nom'];?></td>
                                <td><?php echo $user['prenom'];?></td>
                                <td><?php echo $user['matricule'];?></td>
                                <td><?php echo $user['nomfiliere'];?></td>
                                <td>
                                    <a href="../inscriteleve.php?modifie=<?php echo $user['matricule'] ?>" class="bouton">Modifier</a>
                                    <a href="index.php?supprime=<?php echo $user['matricule'] ?>" class="bouton">Supprimer</a>
                                    <a target="_blank" href="../dompdf.php?matricule=<?php echo $user['matricule']?>" class="bouton">Imprimer</a>
                                </td>
                            </tr>
                            
                            <?php
                            }
                            ?>
                        </tbody>
                        
                        
                    </table>

                </div>
                
               
            </div>
        </div>
    </div>
</body>

</html>