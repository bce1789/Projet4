<?php
include(getcwd() . '/models/billetModel.php');
class billetController
{
  public function findBillet()
  {
    $seeBillet = new billetModel;
    $donnees = $seeBillet->checkBillet();
    include(getcwd() . '/views/billet/listBillet.php');
  }
  public function createBillet()
  {
    if (isset($_POST['titre'], $_POST['auteur'], $_POST['contenu'])) {
      $billet = new billetModel;
      $billet->addBillet($_POST['titre'], $_POST['auteur'], $_POST['contenu']);
      header('Location: /billet');
      exit;
    }
    include(getcwd() . '/views/billet/createBillet.php');
  }
  public function updateBillet()
  {
    $billet = new billetModel;
    $id = intval($_SERVER['QUERY_STRING']);
    if (isset($_POST['titre'], $_POST['auteur'], $_POST['contenu'])) {
      $billet->updateOneBillet($id, $_POST['titre'], $_POST['auteur'], $_POST['contenu']);
      header('Location: /billet');
      exit;
    }
    $donnees = $billet->findOneBillet($id);
    include(getcwd() . '/views/billet/editBillet.php');
  }
  public function deleteBillet()
  {
    $id = intval($_SERVER['QUERY_STRING']);
    $billet = new billetModel;
    $donnees = $billet->deleteOneBillet($id);
    header('Location: /billet');
    exit;
  }
}
