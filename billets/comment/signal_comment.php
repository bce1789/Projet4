<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
try {
    $bdd = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
} catch (Exception $e) {
    die('Erreure : ' . $e->getMessage());
}


$signalComment = $bdd->prepare('UPDATE `commentaires` SET `alerte`= 1 WHERE id=?');
$signalComment->execute(array($_GET['commentaire']));
header('Location: /p4_coste_benoit/billets/billet.php');
?>