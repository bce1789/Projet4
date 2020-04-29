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
}
