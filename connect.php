<?php 

//parametre de connexion a la base de donnée
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "administration";

//connexion à la base de donnée
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    // echo(" La Connection a bien été éffectuer "); 
}
catch(PDOException $e){
    echo("Error: ".$e->getMessage());
}

//vérification de la connexion a la base de donnée
// if ($conn->connect_error) {
//     die("La connexion a échoué: ". $conn->connect_error);
// }else{
//     echo "connexion a la base de donnée";
// }

?>