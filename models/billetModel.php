<?php
require_once(getcwd() . '/models/DBFactory.php');
class billetModel extends DBFactory
{
    public function checkBillet()
    {
        $req = $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM news ');
        $req->execute();
        $donnees = $req->fetchAll(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function findOneBillet($id)
    {
        $req = $this->db->prepare('SELECT titre, contenu, auteur FROM news WHERE id = :id');
        $req->execute(['id' => $id]);
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function deleteOneBillet($id)
    {
        $deleteBillet = $this->db->prepare('DELETE FROM news WHERE id = :id');
        $deleteBillet->execute(['id' => $id]);
    }
    public function updateOneBillet($id , $titre, $auteur, $contenu)
    {
        $requete = $this->db->prepare('UPDATE news SET auteur=:auteur, titre=:titre, contenu=:contenu, dateModif= NOW() WHERE id = :id');
        $requete->bindValue(':titre', $titre);
        $requete->bindValue(':auteur', $auteur);
        $requete->bindValue(':contenu', $contenu);
        $requete->bindValue(':id', $id);
        $requete->execute();
    }
    public function titre()
    {
        return $this->titre;
    }
    public function addBillet($titre, $auteur, $contenu)
    {
        $requete = $this->db->prepare('INSERT INTO news(auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');
        $requete->bindValue(':titre', $titre);
        $requete->bindValue(':auteur', $auteur);
        $requete->bindValue(':contenu', $contenu);
        $requete->execute();
    }
}
