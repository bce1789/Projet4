<?php
require_once(getcwd() . '/models/DBFactory.php');

class commentModel extends DBFactory
{

    public function recupComment($id_billet)
    {
        $req = $this->db->prepare('SELECT id_users, username, commentaires.id, commentaire, alerte, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires inner JOIN users ON (commentaires.id_users=users.id) WHERE id_billet = :id_billet ORDER BY date_commentaire');
        $req->execute(['id_billet' => $id_billet]);
        return $req;
    }
    public function findOneComment($id)
    {
        $req = $this->db->prepare('SELECT commentaire, alerte FROM commentaires WHERE id = :id');
        $req->execute(['id' => $id]);
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function recupnameUser($id_users)
    {
        $userName = $this->db->prepare('SELECT username FROM users WHERE id = :id_users');
        $userName->execute(['id_users' => $id_users]);
        $userName = $userName->fetch(PDO::FETCH_OBJ);
        return $userName;
    }
    public function signalThisComment($alerte, $id)
    {
        $requete = $this->db->prepare('UPDATE `commentaires` SET `alerte`= 1 WHERE id= :id');
       // $requete->execute(array($_GET['commentaire']));
        $requete->bindValue(':alerte', $alerte);
        $requete->bindValue(':id', $id);
        $requete->execute(); 
        /* $signalComment = $this->db->prepare('UPDATE `commentaires` SET `alerte`= 1 WHERE id=?');
        $signalComment->execute(array($_GET['id'])); */
    }
    public function addComment($id_billet)
    {
        $requete = $this->db->prepare('INSERT INTO commentaires (id_users, commentaire, id_billet, date_commentaire) VALUES(?, ?, ?, NOW())');
        $requete->execute(array($_SESSION['auth']->id, $_POST['commentaire'], $id_billet));
    }
    public function deleteThisComment()
    {
        $deleteComment = $this->db->prepare('DELETE FROM commentaires WHERE id=?');
        $deleteComment->execute(array($_GET['id']));
    }
}
