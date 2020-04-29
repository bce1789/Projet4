<?php
include (getcwd().'/models/autoload.php');
//include (getcwd().'/models/NewsManager.php');
//include (getcwd().'/views/functions.php');
require_once (getcwd().'/models/billetModel.php');



//$newConnect = new DBFactory;
//$db = $newConnect->getMysqlConnexionWithPDO();

//$db = DBFactory::getMysqlConnexionWithPDO();
//$manager = new NewsManagerPDO($db);

/* if (session_status() == PHP_SESSION_NONE) {
  session_start();
} */
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('views/headScript.php');?>
</head>

<body>
  
  <?php /* require_once "../inc/header.php"; */ ?>
  <?php require_once (getcwd().'/views/header.php'); ?>
  <div class="container">
  <div class="mx-auto" style="width: 50px;">
    <!--Espace vide -->
    <p></p>
  </div>

  <div class="row">
    <?php require_once (getcwd().'/views/menu.php'); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Publications
      </h3>

      <?php
      //userRole sur BilletModel
      //$reqUser = $db->query('SELECT role_user FROM users');
      ?>
      <?php
      
      // while ($fUser = $role) {
     
        // $reqUser = new billetModel;
        if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
          <!--   -> acceder au propriété de l'objet -> -->
          <p><a href="/admin">Accéder à l'espace d'administration</a></p>
      <?php }
        
      ?>
      <!-- -->
      <?php
      // transferé dans billetModel.php
      // $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM news ORDER BY dateAjout DESC LIMIT 0, 5');
     /*  while ($donnees = $req->fetch()) { */
      var_dump($donnees);
      die;
      while ($donnee = $donnees) {
      ?>
        <div class="news">
          <h3>
            <?php echo htmlspecialchars($donnee->titre); ?>
            <em>le <?php echo $donnee->date_creation_fr; ?></em>
          </h3>
          <p>
            <?php
            // On affiche le contenu du billet
            echo nl2br(html_entity_decode($donnee->contenu));
            ?>
            <br />
            <em><a href="/p4_coste_benoit/index.php?action=comment&billet=<?php echo $donnee->id; ?>">Commentaires</a></em>
            <!-- <em><a href="comment/commentaires.php?billet=<?php //echo $donnees['id']; ?>">Commentaires</a></em> -->
          </p>
        </div>
      <?php
      } // Fin de la boucle des billets
      //$donnees->closeCursor();
      ?>
    </div>
  </div>
  </div>
</body>
</div>
<?php require_once (getcwd().'/views/footer.php'); ?>
</html>