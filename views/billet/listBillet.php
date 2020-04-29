<?php
include(getcwd() . '/models/autoload.php');
require_once(getcwd() . '/models/billetModel.php');
?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once('views/headScript.php'); ?>
</head>

<body>
  <?php require_once(getcwd() . '/views/header.php'); ?>
  <div class="container">
    <div class="mx-auto" style="width: 50px;">
      <!--Espace vide -->
      <p></p>
    </div>
    <div class="row">
      <?php require_once(getcwd() . '/views/menu.php'); ?>
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Publications
        </h3>
        <?php
        if (isset($_SESSION['auth']->role_user)) { ?>
          <!--   -> acceder au propriété de l'objet -> -->
          <p><a href="/admin">Accéder à l'espace d'administration</a></p>
        <?php }
        ?>
        <!-- -->
        <?php
        foreach ($donnees as $donnee) {
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
              <?php
              if (isset($_SESSION['auth']->role_user)) { 
              ?>
              <em><a href="/billet/delete?<?php echo $donnee->id; ?>">Supprimer</a></em>
              <em><a href="/billet/update?<?php echo $donnee->id; ?>">Modifier</a></em>
              <?php } ?>
              <em><a href="/comment/<?php echo $donnee->id; ?>">Commentaires</a></em>
            </p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</body>
</div>
<?php require_once(getcwd() . '/views/footer.php'); ?>

</html>