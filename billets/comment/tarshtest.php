// Récupération des commentaires
      $req = $bdd->prepare('SELECT id_users, id, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
      $req->execute(array($_GET['billet']));   


      // transformer id_users de la table commentaires en username de la table users

 while ($nameUser = $joint->fetch()) {
  ?> 
    <p><strong><?php echo htmlspecialchars($nameUser['id_users']); ?></strong>
    <?php ?> 
    
    <?php 
  } 



  work +++

  // Récupération des commentaires
  $req = $bdd->prepare('SELECT commentaires.id_users, users.id, commentaire.commentaires, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM  `commentaires`, `users` WHERE commentaires.id_users = users.id, commentaires.id_billet = ? ORDER BY date_commentaire');
  $req->execute(array($_GET['billet']));  

  while ($nameUser = $joint->fetch()) {
    ?> 
      <p><strong><?php echo htmlspecialchars($nameUser['username']); ?></strong>
      <?php ?> 
      
      
      <?php 
    } // Fin de la boucle des commentaires




    CURsuppr 

    while ($donnees = $req->fetch()) {
        ?> 
          <p><strong><?php echo htmlspecialchars($donnees['id_users']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
          <?php ?> 
          <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
          <?php if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
           
          <a href ="delete_comment.php?commentaire= <?php echo $donnees['id']; ?>">
          <input type="submit" class="btn btn-danger" value="supprimer" />
          </a>
          <?php } else { ?>
            <form method="post">
            <input type="submit" class="btn btn-danger" value="signaler" />
          </form>
          <?php }
        } // Fin de la boucle des commentaires
        $req->closeCursor();


        ///////////////

        while (($donnees = $req->fetch()) && ($nameUser = $joint->fetch())) {
            ?>
              <p><strong><?php echo htmlspecialchars($nameUser['username']); ?></strong>
                <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
                <?php if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
      
                  <a href="delete_comment.php?commentaire= <?php echo $donnees['id']; ?>">
                    <input type="submit" class="btn btn-danger" value="supprimer" />
                  </a>
                <?php } else { ?>
                  <form method="post">
                    <input type="submit" class="btn btn-danger" value="signaler" />
                  </form>
                <?php } ?>
              <?php
            } // Fin de la boucle des commentaires
            $req->closeCursor();



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
            <?php }
              }
            } // Fin de la boucle des commentaires
            $req->closeCursor();
      
            


             // Signalement
      $reqSign = $bdd->prepare('SELECT alerte FROM commentaires WHERE id=?');
      $reqSign->execute(array($_GET['billet']));
      $signalement = $reqSign->fetch();
      var_dump($signalement);

      while (($signalement = $reqSign->fetch()) ) {
        if ($signalement['alerte'] == 0) {

        }
      }

      if (isset($_SESSION['auth'])) { ?>
        <form method="post" action="commentaire_post.php?billet=<?php echo $_GET['billet']; ?>">
          <div class="form-group">
            <label for="commentaire">Commentaire : </label><textarea name="commentaire" id="commentaire" class="form-control" placeholder="Entrez un commentaire"></textarea><br />
            <?php $_GET['billet'] ?>
            <input type="submit" class="btn btn-primary" value="Envoyer" />
          </div>
        </form>
      <?php } else { ?>
        <p><a href="../../login.php">Se connecter pour écrire</a></p>
      <?php } 

      // Jointure de la table commentaires et users pour afficher le nom d'utilisateur qui poste.
      $joint = $bdd->prepare('SELECT commentaires.id_users,users.id,users.username
      FROM `commentaires`, `users`
      WHERE commentaires.id_users = users.id');
      $joint->execute(array($_GET['billet']));
      $nameUser = $joint->fetch();