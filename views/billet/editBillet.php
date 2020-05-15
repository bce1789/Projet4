<!DOCTYPE html>
<?php
/* include(getcwd() . '/models/autoload.php');
include(getcwd() . '/models/NewsManager.php'); */

?>

<head>
  <?php require_once('views/headScript.php'); ?>
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
      entity_encoding: "raw" //accents problémes


    });
  </script>
</head>

<body>
  <?php require_once 'views/header.php'; ?>
  <div class="mx-auto" style="width: 50px;">
    <!--Espace vide -->
    <p></p>
  </div>

  <div class="row">
    <?php require_once('views/menu.php'); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Publications
      </h3>
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
        <p><a href="/billet">Accéder aux publications</a></p>
        <form action="/billet/update?<?php echo $id ?>" method="post">
          <p style="text-align: center">
            <div class="form-group">
              Auteur : <input type="text" name="auteur" class="form-control" value="jean-forteroche" /><br />
            </div>
            <div class="form-group">
              Titre : <input type="text" name="titre" class="form-control" value="<?php echo $donnees->titre ?>" /><br />
            </div>
            Contenu :<br /><textarea id="mytextarea" rows="8" cols="60" name="contenu"><?php echo $donnees->contenu ?></textarea><br />
            <input type="submit" value="Ajouter" />
        </form>
      </body>

      </html>