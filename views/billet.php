<?php
include (getcwd().'/models/autoload.php');
include (getcwd().'/models/NewsManager.php');
include (getcwd().'/inc/functions.php');
// require '../manager/autoload.php';
// require 'NewsManager.php';
// require '../inc/functions.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog de Jean Forteroche</title>
    <meta name="description" content="Blog de Jean Forteroche">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <?php /* require_once "../inc/header.php"; */ ?>
  <?php require_once (getcwd().'/inc/header.php'); ?>
  <div class="mx-auto" style="width: 50px;">
    <!--Espace vide -->
    <p></p>
  </div>

  <div class="row">
    <?php /* require_once('../inc/menu.php'); */ ?>
    <?php require_once (getcwd().'/inc/menu.php'); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Publications
      </h3>

      <?php
      $reqUser = $db->query('SELECT role_user FROM users');
      ?>
      <?php
      while ($fUser = $reqUser->fetch()) {
        if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
          <!--   -> acceder au propriété de l'objet -> -->
          <p><a href="/p4_coste_benoit/index.php?action=admin">Accéder à l'espace d'administration</a></p>
      <?php }
        $reqUser->closeCursor();
      } ?>

      <!-- -->
      <?php

      $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM news ORDER BY dateAjout DESC LIMIT 0, 5');

      while ($donnees = $req->fetch()) {
      ?>
        <div class="news">
          <h3>
            <?php echo htmlspecialchars($donnees->titre); ?>
            <em>le <?php echo $donnees->date_creation_fr; ?></em>
          </h3>

          <p>
            <?php
            // On affiche le contenu du billet
            echo nl2br(htmlspecialchars($donnees->contenu));
            ?>
            <br />
            <em><a href="/p4_coste_benoit/index.php?action=comment&billet=<?php echo $donnees->id; ?>">Commentaires</a></em>
            <!-- <em><a href="comment/commentaires.php?billet=<?php //echo $donnees['id']; ?>">Commentaires</a></em> -->
          </p>
        </div>
      <?php
      } // Fin de la boucle des billets
      $req->closeCursor();
      ?>
    </div>
  </div>
</body>
</div>
<?php require_once (getcwd().'/inc/footer.php'); ?>
<?php /* require_once '../inc/footer.php'; */ ?>

</html>