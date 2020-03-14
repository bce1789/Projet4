<!-- recuperer le nom de l'utilisateur qui à posté -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
try {
    $bdd = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
} catch (Exception $e) {
    die('Erreure : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO commentaires (id_users, commentaire, id_billet, date_commentaire) VALUES(?, ?, ?, NOW())');
$req->execute(array($_SESSION['auth']->id, $_POST['commentaire'], $_GET['billet']));

header('Location: commentaires.php?billet=' . $_GET['billet']);
?>