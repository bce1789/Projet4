<?php
require_once(getcwd() . '/models/DBFactory.php');
class commentModel extends DBFactory
{
    public function recupBillet()
    {
        $req = $this->db->prepare('SELECT titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM news WHERE id = ?');
        $req->execute(array($_GET['billet']));
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function recupComment()
    {
        $req = $this->db->prepare('SELECT id_users, id, commentaire, alerte, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
        $req->execute(array($_GET['billet']));
    }
    public function recupnameUser($donnees)
    {
        $userName = $this->db->prepare('SELECT username FROM users WHERE id=?');
        $userName->execute(array($donnees['id_users']));
        $userName = $userName->fetch(PDO::FETCH_OBJ);
        return $userName;
    }
}
