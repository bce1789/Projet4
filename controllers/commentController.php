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
        if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) && is_numeric($_SERVER['QUERY_STRING'])) {
            $id = intval($_SERVER['QUERY_STRING']);
            $comment = new commentModel;
            $delete = $comment->deleteThisComment($id);
            header('Location: /billet');
            exit;
        } else {
            $content = "merci de renseigner un numéro de commentaires valide";
            include(getcwd() . '/views/erreur.php');
        }
    }
    public function signalComment()
    {
        if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) && is_numeric($_SERVER['QUERY_STRING'])) {
            $id = intval($_SERVER['QUERY_STRING']);
            $comment = new commentModel;
            $signal = $comment->signalThisComment($id);
            header('Location: /billet');
            exit;
        } else {
            $content = "merci de renseigner un numéro de commentaires valide";
            include(getcwd() . '/views/erreur.php');
        }
    }
}
