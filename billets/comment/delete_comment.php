<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
try {
    $bdd = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
} catch (Exception $e) {
    die('Erreure : ' . $e->getMessage());
}


$deleteComment = $bdd->prepare('DELETE FROM commentaires WHERE id=?');
$deleteComment->execute(array($_GET['commentaire']));
// $deleteComment->execute(array($_SESSION['auth']->id, $_POST['commentaire'], $_GET['billet']));
header('Location: /p4_coste_benoit/billets/billet.php');


?>