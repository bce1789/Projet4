<!DOCTYPE html>
<?php
require 'autoload.php';
require 'NewsManager.php';
?>

<head>
  <?php require_once('../inc/headScript.php'); ?>
  <script src="https://cdn.tiny.cloud/1/03xqzeh8yuf3nsmi1hnw67hoathttg2i6bxihccdekv57viy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: '#mytextarea',
      language: 'fr_FR',

      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
      ],
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: {
          title: 'My Favorites',
          items: 'code visualaid | searchreplace | spellchecker | emoticons'
        }
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css',
      // enlever balises 'p' et 'br'
      forced_root_block: '',
      force_br_newlines: false,
      force_p_newlines: false,

      
    });
  </script>
</head>

<body>
  <?php require_once '../inc/header.php'; ?>
  <div class="mx-auto" style="width: 50px;">
    <!--Espace vide -->
    <p></p>
  </div>

  <div class="row">
    <?php require_once('../inc/menu.php'); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Publications
      </h3>
      <?php
      $db = DBFactory::getMysqlConnexionWithPDO();
      $manager = new NewsManagerPDO($db);

      if (isset($_GET['modifier'])) {
        $news = $manager->getUnique((int) $_GET['modifier']);
      }

      if (isset($_GET['supprimer'])) {
        $manager->delete((int) $_GET['supprimer']);
        $message = 'La news a bien été supprimée !';
      }

      if (isset($_POST['auteur'])) {
        $news = new News(
          [
            'auteur' => $_POST['auteur'],
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu']
          ]
        );

        if (isset($_POST['id'])) {
          $news->setId($_POST['id']);
        }

        if ($news->isValid()) {
          $manager->save($news);

          $message = $news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !';
        } else {
          $erreurs = $news->erreurs();
        }
      }
      ?>
      <!DOCTYPE html>
      <html>

      <head>
        <title>Administration</title>
        <meta charset="utf-8" />

        <style type="text/css">
          table,
          td {
            border: 1px solid black;
          }

          table {
            margin: auto;
            text-align: center;
            border-collapse: collapse;
          }

          td {
            padding: 3px;
          }
        </style>
      </head>

      <body>
        <p><a href="/p4_coste_benoit/billets/billet.php">Accéder aux publications</a></p>

        <form action="admin.php" method="post">
          <p style="text-align: center">
            <?php
            if (isset($message)) {
              echo $message, '<br />';
            }
            ?>
            <div class="form-group">
              <?php if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) echo 'L\'auteur est invalide.<br />'; ?>
              Auteur : <input type="text" name="auteur" class="form-control" value="jean-forteroche" /><br />
            </div>
            <div class="form-group">
              <?php if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) echo 'Le titre est invalide.<br />'; ?>
              Titre : <input type="text" name="titre" class="form-control" value="<?php if (isset($news)) echo $news->titre(); ?>" /><br />
            </div>
            <?php if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) echo 'Le contenu est invalide.<br />'; ?>
            Contenu :<br /><textarea id="mytextarea" rows="8" cols="60" name="contenu"><?php if (isset($news)) echo $news->contenu(); ?></textarea><br />
            <?php
            if (isset($news) && !$news->isNew()) {
            ?>
              <input type="hidden" name="id" value="<?= $news->id() ?>" />
              <input type="submit" value="Modifier" name="modifier" />
            <?php
            } else {
            ?>
              <input type="submit" value="Ajouter" />
            <?php
            }
            ?>
          </p>
        </form>

        <p style="text-align: center">Il y a actuellement <?= $manager->count() ?> publications. En voici la liste :</p>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Auteur</th>
              <th>Titre</th>
              <th>Date d'ajout</th>
              <th>Dernière modification</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php
          foreach ($manager->getList() as $news) {
            echo '<tr><td>', $news->auteur(), '</td><td>', $news->titre(), '</td><td>', $news->dateAjout()->format('d/m/Y à H\hi'), '</td><td>', ($news->dateAjout() == $news->dateModif() ? '-' : $news->dateModif()->format('d/m/Y à H\hi')), '</td><td><a href="?modifier=', $news->id(), '">Modifier</a> | <a href="?supprimer=', $news->id(), '">Supprimer</a></td></tr>', "\n";
          }
          ?>
        </table>
      </body>

      </html>