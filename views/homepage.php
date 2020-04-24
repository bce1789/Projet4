<!DOCTYPE html>
<html lang="fr">
<head><?php require_once('inc/headScript.php');?></head>

<body>
  <?php require 'inc/header.php'; ?>
  <div class="container">
    <div class="mx-auto" style="width: 200px;">
      <!--Espace vide pour séparer les divs-->
      <p></p>
    </div>
    <!-- Présentation --> 
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative text-white rounded bg-dark">
        <div class="col p-4 d-flex flex-column position-static">
          <h1 class="display-4 font-italic h1_title">Blog de Jean Forteroche</h1>
          <br>
          <p class="card-text mb-auto">Je suis ravis de vous faire vivre ma nouvelle aventure.<br>Vous allez découvrir pas à pas ma nouvelle création intitulé <em>Billet simple pour l'Alaska</em>.<br>J'éspére que vous apprécierais le voyage.</p>
          <!-- <a href="#" class="stretched-link">En savoir plus</a> -->
        </div>
        <div class="col-auto d-none d-lg-block">
          <img class="bd-placeholder-img" width="400" height="250" src="img/livre.jpg" alt="photo livre" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
          <title>Placeholder</title>
          </img>
        </div>
      </div>
    <!-- Extraits d'article -->
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Littérature</strong>
            <h3 class="mb-0">Pourquoi un blog?</h3>
            <br>
            <p class="card-text mb-auto">Je souhaitais me lancer depuis longtemps dans l'aventure et j'éspére vous étonner.</p>
            <!-- <a href="#" class="stretched-link">En savoir plus</a> -->
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="img/jeanfort.jpg" alt="photo JF" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
            <title>Placeholder</title>
            <!-- <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text> -->
            </img>


          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Journalisme</strong>
            <h3 class="mb-0">Le journal</h3>
            <div class="mb-1 text-muted">19/01/20</div>
            <p class="mb-auto">Un auteur qui peut toujours nous surprendre.<br><em>Jack Franck, Libération</em></p>
            <!-- <a href="#" class="stretched-link">En savoir plus</a> -->
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="img/journal.jpg" alt="photo JF" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
            <title>Placeholder</title>
            <!-- <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text> -->
            </img>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin des articles -->
    <div class="row">
      <?php require_once('inc/menu.php'); ?>
      <!--Blog main-->
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Mais qui est Jean Forteroche?
        </h3>
        <div class="blog-post">
          <h2 class="blog-post-title">Mon blog</h2>

          <p>Vous pouvez suivre mes publications dans l'onglet <a href="/p4_coste_benoit/index.php?action=billet">Episodes</a>.</p>
          <ul>
            <li>Vous avez la possibilité de vous inscrire afin de participer.</li>
            <li>Je vous encourage à commenter les publications pour plus d'interactivités.</li>
            <li>Vous pouvez également signaler les commentaires inappropriés.</li>
          </ul>
        </div><!-- /.blog-post -->
        <div class="blog-post">
          <h2 class="blog-post-title">Mon histoire</h2>
          <p class="blog-post-meta">24 Janvier, 2020 par <a href="https://fr.wikipedia.org/wiki/Jean_Rochefort">Wikipedia</a></p>

          <p>Reconnaissable à sa voix chaude et à sa moustache, il a joué dans cent treize films et trente-sept téléfilms, jusqu'à son dernier rôle dans Floride, en 2015.</p>
          <hr>
          <p>D'abord voué aux seconds rôles, notamment aux côtés de Belmondo dans Cartouche, Les Tribulations d'un Chinois en Chine ou L'Héritier, il devient un acteur de premier plan à partir de 1972 dans Les Feux de la Chandeleur, aux côtés d'Annie Girardot et Claude Jade.
            <br> Il s'installe ensuite au sommet de l'affiche de nombreux films français notables, parmi lesquels Le Grand Blond avec une chaussure noire avec Pierre Richard, L'Horloger de Saint-Paul avec Philippe Noiret,
            <br>Que la fête commence, Un éléphant ça trompe énormément et sa suite, Nous irons tous au paradis, Le Crabe-tambour, Le Moustachu, Tandem, Le Mari de la coiffeuse, Ridicule, ou encore Le Placard. Alternant des rôles dans des films grand public et des films d'auteurs, il est devenu une figure emblématique du cinéma français.</p>

          <ul>
            <h5><em>Quelques oeuvres:</em></h3>
              <li><em>La terre et moi</em></li>
              <li><em>Le grand fou</em></li>
          </ul>
        </div><!-- /.blog-post -->

        <div class="blog-post">
          <h2 class="blog-post-title">Extrait de mon précedent chef d'oeuvre <em>"Le fou ou l'autre"</em></h2>
          <p class="blog-post-meta">Decembre 21, 2019 par <a href="#">Jean</a></p>

          <p>"Les mots ! Les simples mots ! Combien ils sont terribles ! Combien limpides, éclatants ou cruels !
            <br> On voudrait leur échapper. Quelle subtile magie est donc en eux ?... On dirait qu'ils donnent une forme plastique aux choses informes, et qu'ils ont une musique propre à eux-mêmes aussi douce que celle du luth ou du violon !
            <br>Les simples mots ! Est-il quelque chose de plus réel que les mots ?</p>
        </div><!-- /.blog-post -->


      </div>
      <!--Fin du blog-->
    </div>
  </div>
  </div>
</body>
<?php require 'inc/footer.php'; ?>

</html>