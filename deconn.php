<?php   
    session_start();
    session_destroy();
    header('Location:./se_connecteradmin.php');
    exit;
?>