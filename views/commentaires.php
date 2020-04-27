<?php require_once(getcwd() . '/tools\functions.php'); ?>
<?php require_once(getcwd() . '/controllers/commentController.php'); ?>
<!DOCTYPE html>
<html>

<head>
<?php require_once('views/headScript.php');?>
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

      <?php
      // Connexion à la base de données
      /* try {
        $bdd = new PDO('mysql:host=localhost;dbname=p_4;charset=utf8', 'root', '');
      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      } */

      // Récupération du billet
      /* 
      TRANSFERED TO commentModel.php
      function recupBillet
      $req = $bdd->prepare('SELECT titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM news WHERE id = ?');
      $req->execute(array($_GET['billet']));
      $donnees = $req->fetch(); */
      ?>
      <div class="news">
        <h3>
          <?php $callController = new commentController;
          $callController->commentTitle(); /*  TRANSFERT TO commentController.php echo htmlspecialchars(utf8_decode($donnees['titre'])); */ ?>
          <em>le <?php /* echo $donnees['date_creation_fr']; */ ?></em>
        </h3>
        <p>
          <?php
          echo nl2br(htmlspecialchars(utf8_decode($donnees['contenu'])));
          ?>
        </p>
      </div>
      <h2>Commentaires</h2>
      <?php
      $req->closeCursor(); //libère le curseur pour la prochaine requête

      // Récupération des commentaires
      /* 
      TRANSFERT TO commentModel.php
      $req = $bdd->prepare('SELECT id_users, id, commentaire, alerte, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
      $req->execute(array($_GET['billet'])); */

      while (($donnees = $req->fetch())) {
        if (!empty($donnees['commentaire'])) {
          $appearsName = new commentModel;
          /* 
          TRANSFERT TO commentModel.php
          $userName = $bdd->prepare('SELECT username FROM users WHERE id=?');
          $userName->execute(array($donnees['id_users']));
          $userName = $userName->fetch(); */
      ?>
          <p><strong><?php echo htmlspecialchars($userName['username']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
          <?php ?>
          <p><?php echo nl2br(htmlspecialchars(utf8_decode($donnees['commentaire']))); ?></p>
          <?php if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
            <a href="/commentaire= <?php echo $donnees['id']; ?>">
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