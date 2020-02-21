<?php
require 'autoload.php';
require 'NewsManager.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once('../inc/headScript.php');?>
  </head>
  
  <body>
    <?php require_once('../inc/header.php'); ?>
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
        <p><a href="admin.php">Accéder à l'espace d'administration</a></p>
<?php


  if (isset($_GET['id']))
  {
    $news = $manager->getUnique((int) $_GET['id']);
    
    echo '<p>Par <em>', $news->auteur(), '</em>, le ', $news->dateAjout()->format('d/m/Y à H\hi'), '</p>', "\n",
        '<h2>', $news->titre(), '</h2>', "\n",
        '<p>', nl2br($news->contenu()), '</p>', "\n";
    
    if ($news->dateAjout() != $news->dateModif())
    {
      echo '<p style="text-align: right;"><small><em>Modifiée le ', $news->dateModif()->format('d/m/Y à H\hi'), '</em></small></p>';
    }
  }

  else
  {
    echo '<h2 style="text-align:center">Liste des 5 dernières publications</h2>';
    
    foreach ($manager->getList(0, 5) as $news)
    {
      if (strlen($news->contenu()) <= 200)
      {
        $contenu = $news->contenu();
      }
      
      else
      {
        $debut = substr($news->contenu(), 0, 200);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $contenu = $debut;
      }
      
      echo '<h4><a href="?id=', $news->id(), '">', $news->titre(), '</a></h4>', "\n",
          '<p>', nl2br($contenu), '</p>';
    }
  }
  ?>
      </div>
    </div>
  </body>
      
  <?php require_once '../inc/footer.php'; ?>
</html>