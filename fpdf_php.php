<?php
require('./fpdf185/fpdf.php');

require_once('./connect.php');

$sql = 'SELECT * FROM inscription';
$req = $conn -> Query($sql);
$etu = $req -> fetch();

$date = date("d/m/Y");
$heure = date("h:i:s");
$pdf = new FPDF ('P', 'mm', 'A4');
$pdf ->  AddPage();

$pdf -> Image('./Logo/UNIVERSITE_DE_L_AMITIEE-removebg-preview.png', 10, 6, 20);
$pdf -> Ln(15);

$pdf -> SetFont('Times', 'B',10);

$pdf -> Cell(160, 10, utf8_decode('UDA Ivoiro-Sénégalaise'), 0,0);
$pdf -> Cell(20, 10, '2022 / 2023', 0,0);
$pdf -> Cell(60, 10, '', 0,0);
$pdf -> Ln(8);

$pdf -> SetFont('Times', '',12);
$pdf -> Cell(150, 8, 'Abidjan' , 0,0);
$pdf -> Cell(13, 10, 'Date :' , 0,0);
$pdf -> Cell(47, 10, $date , 0,0);
$pdf -> Ln(8);

$pdf -> SetFont('Times', '',12);
$pdf -> Cell(30, 8, utf8_decode('Téléphone :') , 0,0);
$pdf -> Cell(13, 8, ' 07-49-66-89-62' , 0,0);
$pdf -> Ln(15);

$pdf -> SetFont('Times', 'B',12);
$pdf -> Cell(70, 8, '' , 0,0);
$pdf -> Cell(47, 8, 'Liste des Etudiants inscris' , 0,1, 'C');
$pdf -> Ln(15);

//tableau

$pdf -> Cell(35, 8, 'Nom' , 1,0 , 'C');
$pdf -> Cell(40, 8, 'Prenom' , 1,0 , 'C');
$pdf -> Cell(40, 8, 'Email' , 1,0 , 'C');
$pdf -> Cell(40, 8, 'Matricule' , 1,0 , 'C');
$pdf -> Cell(40, 8, utf8_decode('Filière') , 1,1 , 'C');

// ligne avec les informations

$pdf -> Cell(35, 8, $etu['nom'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['prenom'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['email'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['matricule'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['nomfiliere'], 0,1 , 'C');

$pdf -> Cell(35, 8, $etu['nom'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['prenom'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['email'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['matricule'] , 0,0 , 'C');
$pdf -> Cell(40, 8, $etu['nomfiliere'], 0,1 , 'C');
//footer

$pdf -> Image('./icone/drapeau-removebg-preview.png', 170, 6, 25);

$pdf -> Output()
?>