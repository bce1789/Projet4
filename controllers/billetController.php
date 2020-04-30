<?php 
include(getcwd() . '/models/billetModel.php');
class billetController {
    public function findBillet(){
        $seeBillet = new billetModel;
        $donnees = $seeBillet->checkBillet();
        include (getcwd().'/views/billet/listBillet.php');
    }
    public function createBillet(){
      $news = intval($_SERVER['QUERY_STRING']);
      $billet = new billetModel;
      $donnees = $billet->addBillet($news);
        /* if (isset($_GET['modifier'])) {
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
          } */
    }
    public function updateBillet(){
        $id = intval($_SERVER['QUERY_STRING']);
        $billet = new billetModel;
        $donnees = $billet->findOneBillet($id);
        include(getcwd() . '/views/admin.php');
    }
    public function deleteBillet(){
      $id = intval($_SERVER['QUERY_STRING']);
      $billet = new billetModel;
      $donnees = $billet->updateOneBillet($id);
      include(getcwd() . '/views/billet/listBillet.php');
  }
}