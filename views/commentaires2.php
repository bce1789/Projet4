<?php
/* require_once(getcwd() . '/tools\functions.php');
require_once(getcwd() . '/controllers/commentController.php');
include(getcwd() . '/models/autoload.php'); */
// require_once(getcwd() . '/models/billetModel.php');
require_once(getcwd() . '/models/commentModel.php');
?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once('views/headScript.php'); ?>
</head>

<body>
  <?php require_once(getcwd() . '/views/header.php'); ?>
  <div class="mx-auto" style="width: 50px;">
    <!--Espace vide -->
    <p></p>
  </div>

  <div class="row">
    <?php require_once(getcwd() . '/views/menu.php'); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Commentaires des publications
      </h3>
      <p><a href="/billet">Retour à la liste des billets</a></p>
      <div class="news">
        <h3>
        </h3>
        <p>
        </p>
      </div>
      <h2>Commentaires</h2>
      
      <?php 
      
      // Récupération des commentaires
      foreach ($donnees as $donnee) {
        if (!empty($donnees['commentaire'])) {
      ?>
          <p><strong><?php echo htmlspecialchars($userName['username']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
          <?php ?>
          <p><?php echo nl2br(htmlspecialchars(utf8_decode($donnee['commentaire']))); ?></p>
          <?php if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
            <a href="/commentaire= <?php echo $donnee['id']; ?>">
              <input type="submit" class="btn btn-danger" value="supprimer" />
            </a>
            <?php }
          if ($donnees['alerte'] != 1) {
            if (isset($_SESSION['auth'])) {
              if (!$_SESSION['auth']->role_user) {
            ?>
                <a href="/comment= <?php echo $donnees['id']; ?>">
                  <input type="submit" class="btn btn-danger" value="signaler" />
                </a>
            <?php }
            }
          } else { ?>
            <input type="submit" class="btn btn-warning" value="Contenu signalé" />
      <?php
          }
        }
      } // Fin de la boucle des commentaires
      $req->closeCursor(); ?>

      <div class="mx-auto" style="width: 50px;">
        <!--Espace vide -->
        <p></p>
      </div>
      <?php if (isset($_SESSION['auth'])) { ?>
        <form method="post" action="/billet=<?php echo $_GET['billet']; ?>">
          <div class="form-group">
            <label for="commentaire">Commentaire : </label><textarea name="commentaire" id="commentaire" class="form-control" placeholder="Entrez un commentaire"></textarea><br />
            <?php $_GET['billet'] ?>
            <input type="submit" class="btn btn-primary" value="Envoyer" />
          </div>
        </form>
      <?php } else { ?>
        <p><a href="/admin">Se connecter pour écrire</a></p>
      <?php } ?>

</body>
</div>
</div>
</div>
<<?php require_once(getcwd() . '/views/footer.php'); ?> </html>