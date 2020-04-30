<?php 
require_once(getcwd() . '/models/DBFactory.php');
class billetModel extends DBFactory {
    public function checkBillet(){
        $req = $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM news ');
        $req->execute();
        $donnees = $req->fetchAll(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function findOneBillet($id){
        $req = $this->db->prepare('SELECT titre, contenu FROM news WHERE id = :id');
        $req->execute(['id' => $id]);
        $donnees = $req->fetchAll(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function deleteOneBillet($id){
        $deleteBillet = $this->db->prepare('DELETE FROM news WHERE id = :id');
        $deleteBillet->execute(['id' => $id]);
        $deleteThisOne = $deleteBillet->fetchAll(PDO::FETCH_OBJ);
        return $deleteThisOne;
    }
    public function updateOneBillet($id){
        $upBillet = $this->db->prepare('UPDATE titre, contenu FROM news WHERE id = :id');
        $upBillet->execute(['id' => $id]);
        //$upBillet->execute(array($_GET['billet']));
        $updateThisOne = $upBillet->fetchAll(PDO::FETCH_OBJ);
        return $updateThisOne;
    }
    public function addBillet($news){
      $requete = $this->db->prepare('INSERT INTO news(auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');
      $requete->bindValue(':titre', $news->titre());
      $requete->bindValue(':auteur', $news->auteur());
      $requete->bindValue(':contenu', $news->contenu());
      $requete->execute();
    }
}
