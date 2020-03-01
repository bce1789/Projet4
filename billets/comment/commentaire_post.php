<!-- recuperer l'id de l'utilisateur qui est connecté -->

<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
try {
    $bdd = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
} catch (Exception $e) {
    die('Erreure : ' . $e->getMessage());
}

var_dump($_POST['commentaire']);
var_dump($_GET['billet']);
var_dump($_SESSION);
die;
$req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire, id_billet, date_commentaire) VALUES(?, ?, ?, NOW())');
$req->execute(array($_GET['id'], $_POST['commentaire'], $_GET['billet']));
header('Location: commentaires.php?billet=' . $_GET['billet']);
?>