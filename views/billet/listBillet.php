<?php
$title = 'billet';
ob_start(); ?>
  <div class="container">
    <div class="mx-auto">
      <p></p>
    </div>
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Publications
        </h3>
        <?php
        if (isset($_SESSION['auth']->role_user)) { ?>
          <p><a href="/billet/create">Création du nouveau billet</a></p>
        <?php }
        ?>
        <?php
        foreach ($donnees as $donnee) {
        ?>
          <div class="news">
            <h3>
              <?php 
              
              echo htmlspecialchars($donnee->titre); ?>
              <em>le <?php echo $donnee->date_creation_fr; ?></em>
            </h3>
            <p>
              <?php
              // On affiche le contenu du billet
              echo nl2br(html_entity_decode($donnee->contenu)); ?>
              <br />
              <p>Par: <em><?php echo htmlspecialchars($donnee->auteur);?></em></p>
              <?php
              if (isset($_SESSION['auth']->role_user)) { 
              ?>
              <em><a href="/billet/delete?<?php echo $donnee->id; ?>">Supprimer</a></em>
              <em><a href="/billet/update?<?php echo $donnee->id; ?>">Modifier</a></em>
              <?php } if (isset($_SESSION['auth'])) { ?>
              <em><a href="/comment?<?php echo $donnee->id; ?>">Commentaires</a></em>
              <?php } 
              else {
                $_SESSION['flash']['primary'] = 'Vous devez être connécté pour accéder aux commentaires';
              }
              ?>
            </p>
          </div>
        <?php
        }
        ?>
      </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>

