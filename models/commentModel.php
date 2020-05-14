<?php
require_once(getcwd() . '/models/DBFactory.php');

class commentModel extends DBFactory
{
    
    public function recupComment($id_billet)
    {
        $req = $this->db->prepare('SELECT id_users, id, commentaire, alerte, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire');
        $req->execute(['id_billet' => $id_billet]);
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;

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
    public function signalComment($id, $alerte)
    {
        $requete = $this->db->prepare('UPDATE `commentaires` SET `alerte`= 1 WHERE id= :id');
        // $requete->execute(array($_GET['commentaire']));
        $requete->bindValue(':alerte', $alerte);
        $requete->bindValue(':id', $id);
        $requete->execute();
    }
    public function addComment($commentaire)
    {
        $requete = $this->db->prepare('INSERT INTO commentaires(commentaire) VALUES(:commentaire NOW(), NOW())');
        $requete->bindValue(':commentaire', $commentaire);
        $requete->execute();
        /* $requete->execute(['id_billet' => $id_billet]);
        $donnees = $requete->fetch(PDO::FETCH_OBJ);
        return $donnees; */
    }
}

//jointure commentaires et utilisateurs
