<!-- <header>
<script type="text/javascript">
function delete_com(id)
{
    if (confirm("Supprimer le commentaire ?"))
    {
        document.location.href='commentaires.php?id=' + id;
    }
}
</script></header> -->

<?php require_once('../../inc/functions.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once('../../inc/headScript.php'); ?>
</head>

<body>
  <?php require_once('../../inc/headerBillets.php'); ?>
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
      <p><a href="../index.php">Retour à la liste des billets</a></p>

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


      // Jointure interne
      // $joint = $bdd->prepare('SELECT commentaires.id_users, users.username FROM username, commentaires WHERE users.id = commentaires.id');

      // Récupération des username de la table users pour l'afficher lors du commentaire
      //$reqUserName = $bdd->prepare('SELECT username, FROM users WHERE 1');
      //$reqUserName->execute(array($_SESSION['auth']->username));
      // $joint->execute(array($_GET['billet']));
      // $nameUser = $joint->fetch();
      //$userName = $reqUserName->fetch();
      // var_dump($joint);
      //var_dump($reqUserName);

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
      // $recupC = $req->fetch();

      //Requéte afin de préparer une interface de supression des commentaires
      // $deleteComment = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
      // $deleteComment->execute(array($_GET['billet']));
      // $dc = $deleteComment->fetch();
      // var_dump($dc);
      // while ($dc = $deleteComment->fetch()) {

      // }

      //
      //
      /* $reqUser = $bdd->prepare('SELECT username FROM users WHERE username = ?');
      $reqUser->execute(array($_GET['billet']));
      $dataName = $reqUser->fetch();
      var_dump($dataName['username']);
      while ($dataName = $reqUser->fetch()) {
         ?><p><strong><?php echo htmlspecialchars($dataName['username']);
      }
 */
      

      while ($donnees = $req->fetch()) {
        
        // $userName = $bdd->query('SELECT username FROM users');
        // var_dump($userName);
      ?>
        <p><strong><?php echo htmlspecialchars($donnees['id_users']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
        <?php //echo $dataName
         // Récuperer le nom de l'utilisateur qui a posté?> 
        <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
        <?php
        // echo '<input type="button" value="Supprimer" onclick="delete_com('.$recupC['id'].')">';
        //delete_signal();

        // Redirection vers la page de suppression
        ?>
        <?php if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
         
        <a href ="delete_comment.php?commentaire= <?php echo $donnees['id']; ?>">
      
          <button>Supprimer</button>
          
        </a>
        <?php } else { ?>
          <form method="post">
          <input type="submit" class="btn btn-danger" value="signaler" />
        </form>
        <?php }
      } // Fin de la boucle des commentaires
      $req->closeCursor();
      ?>



      <?php if (isset($_SESSION['auth'])) { ?>
        <form method="post" action="commentaire_post.php?billet=<?php echo $_GET['billet']; ?>">
          <label for="commentaire">Commentaire : </label><textarea name="commentaire" id="commentaire" placeholder="Entrez un commentaire"></textarea><br />
          <?php $_GET['billet'] ?>
          <input type="submit" value="Envoyer" />
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