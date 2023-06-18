<?php

    //connection à la base de donnée
    require_once './connect.php';
    require_once './dompdf/autoload.inc.php';

    use Dompdf\dompdf;
    use Dompdf\Options;

    

    $matricule=$_GET['matricule'];
    $sql = "SELECT * FROM inscription WHERE matricule = '$matricule' ";
    $req = $conn -> query($sql);
    $etu = $req -> fetchAll();

    
    $pdf = new Dompdf($options);
    ob_start();
    require_once './dompdf_html.php';
    $html = ob_get_contents();
    ob_get_clean();
    
    $pdf -> loadHtml($html);
    $pdf->setPaper('A4', 'portrait');

    $date =  date('d-m-y h:i:s');

    $options = new Options();

    $options->set('defaultFont', 'Courier');

    $options -> set('isRemoteEnabled', true);
    
    
    
    
    
    
    $fichier = 'Inscription';
    $pdf->render();
    $pdf->stream($fichier, ['Attachement' => false]);

?>