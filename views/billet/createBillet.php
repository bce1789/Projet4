<?php
$title = 'createBillet';
ob_start();
?>
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
      content_css: 'public/css/styles.css',
      // enlever balises 'p' et 'br'
      forced_root_block: '',
      force_br_newlines: false,
      force_p_newlines: false,
      entity_encoding: "raw" //accents problémes
    });
  </script>
<div class="mx-auto" style="width: 50px;">
  <!--Espace vide -->
  <p></p>
</div>
<div class="col-md-8 blog-main">
  <h3 class="pb-4 mb-4 font-italic border-bottom">
    Publications
  </h3>
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
  <p><a href="/billet">Accéder aux publications</a></p>
  <form action="/billet/create" method="post">
    <p style="text-align: center">
      <div class="form-group">
        <input type="text" name="auteur" class="form-control" value="Jean-forteroche" /><br />
      </div>
      <div class="form-group">
        <input type="text" name="titre" class="form-control" required /><br />
      </div>
      <div class="form-group">
        <br /><textarea id="mytextarea" rows="8" cols="60" name="contenu"></textarea><br />
      </div>
      <input type="submit" value="Ajouter" />
  </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>