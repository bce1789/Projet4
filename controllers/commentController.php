<?php
include(getcwd() . '/models/commentModel.php');
class commentController
{
    public function findComment()
    {
        $id_billet = intval($_SERVER['QUERY_STRING']);
        $seeComment = new commentModel;
        $donnees = $seeComment->recupComment($id_billet);
        $dataName = $seeComment->recupnameUser(intval($donnees->id_users));      
        include(getcwd() . '/views/commentaires.php');
    }
    public function createComment()
    {
        include(getcwd() . '/views/commentaires.php');
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
