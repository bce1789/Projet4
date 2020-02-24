<?php
require 'autoload.php';
require 'NewsManager.php';
require '../inc/functions.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);


?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once('../inc/headScript.php');?>
  </head>
  
  <body>
    <?php require_once('../inc/headerBillets.php'); ?>
    <div class="mx-auto" style="width: 50px;">
      <!--Espace vide -->
      <p></p>
    </div>
    
    <div class="row">
    <?php require_once('../inc/menu.php');?>
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Publications
        </h3>
        <?php if (isset ($_SESSION['auth'])) { ?>
          <p><a href="admin.php">Accéder à l'espace d'administration</a></p>
        <?php } else { ?>
          <p><a href="../login.php">Se connecter pour écrire</a></p>
        <?php } ?>
        
<!-- -->
  <?php 

      $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM news ORDER BY dateAjout DESC LIMIT 0, 5');

      while ($donnees = $req->fetch())
      {
      ?>
      <div class="news">
          <h3>
              <?php echo htmlspecialchars($donnees['titre']); ?>
              <em>le <?php echo $donnees['date_creation_fr']; ?></em>
          </h3>
          
          <p>
          <?php
          // On affiche le contenu du billet
          echo nl2br(htmlspecialchars($donnees['contenu']));
          ?>
          <br />
          <em><a href="comment/commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
          </p>
      </div>
      <?php
      } // Fin de la boucle des billets
      $req->closeCursor();
      ?>
        </div>
      </div>
    </body>
      
  <?php require_once '../inc/footer.php'; ?>
</html>