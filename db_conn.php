<?php 
//parametre de connexion a la base de donnée
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eleveinscrit";

//connexion à la base de donnée
$conn = mysqli_connect($servername, $username, $password, $dbname);

//vérification de la connexion a la base de donnée
if ($conn->connect_error) {
    die("La connexion a échoué: ". $conn->connect_error);
}else{
    echo "connexion a la base de donnée";
}
?>











<?php require 'db_conn.php';


    if(isset($_POST['Enregistrer'])){
        if (!empty($_POST['Nom'] AND $_POST['Prenom'] AND $_POST['date'] AND $_POST['email'] AND $_POST['sexe'] AND $_POST['contact'] AND $_POST['adresse'] AND $_POST['pays'] AND $_POST['Prépa'] AND $_POST['Niveau'] AND $_POST['Nompere'] AND $_POST['Contactpere'] AND $_POST['Nommere'] AND $_POST['Contactmere'])){

            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $date = $_POST['date']; 
            $Email = $_POST['Email'];
            $sexe = $_POST['sexe'];
            $Contact = $_POST['Contact'];
            $Adresse = $_POST['Adresse'];
            $Nationnalite =$_POST['pays'];
            $Prepa = $_POST['Prepa'];
            $Niveau = $_POST['Niveau'];
            $Nompere = $_POST['Nompere'];
            $Contactpere = $_POST['Contactpere'];
            $Nommere = $_POST['Nommere'];
            $Contactmere = $_POST['Contactmere'];
            $query = mysqli_query($conn, "INSERT INTO etudiant (Nom,Prenom,Datenais, Email, Email, sexe, Contact, Adresse, Pays, Prepa, Niveau, Nompere, Contactpere, Nommere, Contactmere)
             VALUES ('$Nom', '$Prenom','$date', '$Email', '$sexe', '$Contact', '$Adresse', '$Nationnalite', '$Prepa', '$Niveau', '$Nompere', '$Contactpere', '$Nommere', '$Contactmere') ");

        }else {
            echo "Veuillez complèter toutes les informations" ;
        }
    }
?>















<?php

$bdd = new PDO('mysql:host=localhost;dbname=eleveinscrit;charset=utf8', 'root','');

    if (isset($_POST['Enregistrer'])){
        if (!empty($_POST['Nom'] 
        AND !empty($_POST['Prenom'])  
        AND !empty($_POST['date'])  
        AND !empty($_POST['email'])  
        AND !empty($_POST['sexe'])  
        AND !empty($_POST['contact'])  
        AND !empty($_POST['adresse'])  
        AND !empty($_POST['pays'])  
        AND !empty($_POST['Prépa'])  
        AND !empty($_POST['Niveau'])  
        AND !empty($_POST['Nompere'])  
        AND !empty($_POST['Contactpere'])  
        AND !empty($_POST['Nommere'])  
        AND !empty($_POST['Contactmere']) )){

            $Nom = htmlspecialchars($_POST['Nom']);
            $Prenom = htmlspecialchars($_POST['Prenom']);
            $date = htmlspecialchars($_POST['date']); 
            $Email = htmlspecialchars($_POST['Email']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $Contact = htmlspecialchars($_POST['Contact']);
            $Adresse = htmlspecialchars($_POST['Adresse']);
            $Nationnalite =htmlspecialchars($_POST['pays']);
            $Prepa = htmlspecialchars($_POST['Prepa']);
            $Niveau = htmlspecialchars($_POST['Niveau']);
            $Nompere = htmlspecialchars($_POST['Nompere']);
            $Contactpere = htmlspecialchars($_POST['Contactpere']);
            $Nommere = htmlspecialchars($_POST['Nommere']);
            $Contactmere = htmlspecialchars($_POST['Contactmere']);

            $inserUser = $bdd->prepare('INSERT INTO etudiant (Nom,Prenom,Datenais, Email, Email, sexe, Contact, Adresse, Pays, Prepa, Niveau, Nompere, Contactpere, Nommere, Contactmere) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $inserUser->execute(array($Nom, $Prenom,$date, $Email, $sexe, $Contact, $Adresse, $Nationnalite, $Prepa, $Niveau, $Nompere, $Contactpere, $Nommere, $Contactmere));

        }else{
            echo "Veuiller replir tous les champs ...";
        }
    }
?>


























































<--- <fieldset> 
            <legend>INFORMATION SUR LES PARENTS</legend>
            <section class="grand">
                <section class="parent1">
                    <div>
                        <label for="nompere">Nom et Prénom du père</label>
                        <input type="text" id="nompere" name="Nompere" placeholder="Entrez le nom du père" class="inp">
                    </div>
                    <div>
                        <label for="contactpere">Contact du père</label>
                        <input type="text" id="contactpere" name="Contactpere" placeholder="Contact du père" class="inp">
                    </div>
                </section>
                

                <section class="parent2">
                    <div>
                        <label for="nommere">Nom et Prénom de la mère</label>
                        <input type="text" id="nommere" name="Nommere" placeholder="Entrez le nom de la mère" class="inp">
                    </div>
                    <div>
                        <label for="contactmere">Contact de la mère</label>
                        <input type="text" id="contactmere" name="Contactmere" placeholder="Contact de la mère" class="inp">
                    </div>
                </section>
                
            </section>

        </fieldset>
        <div class="label2">
            <input type="submit" value="Enregistrer">
        </div> --->



        <div class="label">
                    <label for="group">Prépa</label>
                    <select name="group" id="group">
                        <option value="1"></option>
                        <option value="2">BCPST</option>
                        <option value="3">PCSI</option>
                        <option value="4">MP2I</option>
                        <option value="5">MPSI</option>
                        <option value="6">PTSI</option>
                        <option value="7">TSI</option>
                        <option value="8">PSI</option>
                        <option value="9">PSI</option>
                    </select>
                </div>

                <div class="label">
                    <label for="group">Niveau</label>
                    <select name="group" id="group">
                        <option value="1"></option>
                        <option value="2">Prépa 1</option>
                        <option value="3">Prépa 2</option>
                    </select>
                </div>
                </div>


                <div class="label">
                        <label for="group">Sexe</label>
                        <select name="group" id="group">
                            <option value="1"></option>
                            <option value="2">Masculin</option>
                            <option value="3">Féminin</option>
                        </select>
                    </div>