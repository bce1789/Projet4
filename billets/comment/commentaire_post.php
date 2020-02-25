<?php
try 
{
$bdd = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
}
catch(Exception $e)
{
 die('Erreure : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire, id_billet, date_commentaire) VALUES(?, ?, ?, NOW())');
$req->execute(array($_POST['auteur'], $_POST['commentaire'], $_GET['billet']));
header('Location: commentaires.php');
?>