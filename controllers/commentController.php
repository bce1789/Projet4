<?php
include(getcwd() . '/models/commentModel.php');
include_once(getcwd() . '/models/billetModel.php');
class commentController
{
    public function findComment()
    {
        $id_billet = intval($_SERVER['QUERY_STRING']);
        $seeComment = new commentModel;
        $donnees = $seeComment->recupComment($id_billet);
        //
        $id = intval($_SERVER['QUERY_STRING']);
        $seeBillet = new billetModel;
        $billet = $seeBillet->findOneBillet($id);
        include(getcwd() . '/views/commentaires.php');
    }
    public function createComment()
    {
        $id_billet = intval($_SERVER['QUERY_STRING']);
        if (isset($_POST['commentaire'])) {
            $comment = new commentModel;
            $comment->addComment($id_billet, $_POST['commentaire'], $_SESSION['auth']->id);
            header('Location: /billet');
        exit;
        }
        header('Location: /billet');
        exit;
    }
    public function deleteComment()
    {
        $id_billet = intval($_SERVER['QUERY_STRING']);
        $comment = new commentModel;
        $donnees = $comment->recupComment($id_billet);
        header('Location: /billet');
        exit;
    }
}
