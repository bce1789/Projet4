<?php require_once('../../inc/functions.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once('../../inc/headScript.php'); ?>
</head>

<body>
  <?php include __DIR__ . "/../../inc/header.php"; ?>
  <div class="mx-auto" style="width: 50px;">
    <!--Espace vide -->
    <p></p>
  </div>

  <div class="row">
    <?php require_once('../../inc/menu.php'); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Commentaires des publications
      </h3>
      <p><a href="../billet.php">Retour à la liste des billets</a></p>

      <?php
      // Connexion à la base de données
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=p_4;charset=utf8', 'root', '');
      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }

      // Récupération du billet
      $req = $bdd->prepare('SELECT titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM news WHERE id = ?');
      $req->execute(array($_GET['billet']));
      $donnees = $req->fetch();
      ?>
      <div class="news">
        <h3>
          <?php echo htmlspecialchars($donnees['titre']); ?>
          <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>
        <p>
          <?php
          echo nl2br(htmlspecialchars($donnees['contenu']));
          ?>
        </p>
      </div>
      <h2>Commentaires</h2>
      <?php
      $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

      // Récupération des commentaires
      $req = $bdd->prepare('SELECT id_users, id, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
      $req->execute(array($_GET['billet']));

      // Jointure de la table commentaires et users pour afficher le nom d'utilisateur qui poste.
      $joint = $bdd->prepare('SELECT commentaires.id_users,users.id,users.username
      FROM `commentaires`, `users`
      WHERE commentaires.id_users = users.id');
      $joint->execute(array($_GET['billet']));
      $nameUser = $joint->fetch();

      // transformer id_users de la table commentaires en username de la table users

      while (($donnees = $req->fetch()) && ($nameUser = $joint->fetch())) {
        if (!empty($donnees['commentaire'])) {
      ?>
          <p><strong><?php echo htmlspecialchars($nameUser['username']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
          <?php ?>
          <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
          <?php if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
            <a href="delete_comment.php?commentaire= <?php echo $donnees['id']; ?>">
              <input type="submit" class="btn btn-danger" value="supprimer" />
            </a>
          <?php } else { ?>
            <input type="submit" class="btn btn-danger" value="signaler" /> <?php
          }
        }
      } // Fin de la boucle des commentaires
      $req->closeCursor();?>

      <div class="mx-auto" style="width: 50px;">
        <!--Espace vide -->
        <p></p>
      </div>
      <?php if (isset($_SESSION['auth'])) { ?>
        <form method="post" action="commentaire_post.php?billet=<?php echo $_GET['billet']; ?>">
          <div class="form-group">
            <label for="commentaire">Commentaire : </label><textarea name="commentaire" id="commentaire" class="form-control" placeholder="Entrez un commentaire"></textarea><br />
            <?php $_GET['billet'] ?>
            <input type="submit" class="btn btn-primary" value="Envoyer" />
          </div>
        </form>
      <?php } else { ?>
        <p><a href="../../login.php">Se connecter pour écrire</a></p>
      <?php } ?>

</body>
</div>
</div>
</div>
<?php require_once '../../inc/footer.php'; ?>

</html>