<?php
try 
{
$bdd = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
}
catch(Exception $e)
{
 die('Erreure : '.$e->getMessage());
}

var_dump($_POST['commentaire']);
var_dump($_GET['billet']);
die;
$req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire, id_billet, date_commentaire) VALUES(?, ?, ?, NOW())');
$req->execute(array($_GET['id'], $_POST['commentaire'], $_GET['billet']));
header('Location: commentaires.php?billet='. $_GET['billet']);
?>