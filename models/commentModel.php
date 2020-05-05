<?php
require_once(getcwd() . '/models/DBFactory.php');
require_once(getcwd() . '/models/billetModel.php');
class commentModel extends DBFactory
{
    public function findBillet() // reprise de la function de billetController pour afficher le billet correspondant
    {
        $seeBillet = new billetModel;
        $donnees = $seeBillet->checkBillet();
        include(getcwd() . '/views/billet/listBillet.php');
    }
    public function recupComment($id_billet) // récup de l'id du billet pour le lier au commentaire
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
        var_dump($donnees);
        exit;
    }
    public function recupnameUser($userName)
    {
        $userName = $this->db->prepare('SELECT username FROM users WHERE id = :id');
        $userName->execute(array($userName['id_users']));
        $userName = $userName->fetch(PDO::FETCH_OBJ);
        return $userName;
    }
    public function signalComment($id, $alerte){
        $requete = $this->db->prepare('UPDATE `commentaires` SET `alerte`= 1 WHERE id= :id');
       // $requete->execute(array($_GET['commentaire']));
        $requete->bindValue(':alerte', $alerte);
        $requete->bindValue(':id', $id);
        $requete->execute();
    }
    public function addComment($id_billet, $commentaire, $date_commentaire, $id_users, $alerte)
    {
        $requete = $this->db->prepare('INSERT INTO commentaires(id_billet, commentaire, date_commentaire, id_users, alerte) VALUES(:id_billet, :commentaire, :date_commentaire, :id_users, :alerte NOW(), NOW())');
        $requete->bindValue(':id_billet', $id_billet);
        $requete->bindValue(':commentaire', $commentaire);
        $requete->bindValue(':date_commentaire', $date_commentaire);
        $requete->bindValue(':id_users', $id_users);
        $requete->bindValue(':alerte', $alerte);
        $requete->execute();
    }
}
