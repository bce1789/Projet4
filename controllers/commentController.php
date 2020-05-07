<?php
include(getcwd() . '/models/commentModel.php');
class commentController
{
    public function findComment()
    {
        $id_billet = intval($_SERVER['QUERY_STRING']);
        $seeComment = new commentModel;
        $donnees = $seeComment->recupComment($id_billet);
        /* var_dump($donnees);
        die; */
        
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
    public function findNameUser(){
        $username = intval($_SERVER['QUERY_STRING']);
        $checkName = new commentModel;
        $dataName = $checkName->recupnameUser($username);
        
        include_once(getcwd() . '/views/commentaires.php');
    }
}
