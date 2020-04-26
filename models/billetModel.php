<?php 
require_once(getcwd() . '/models/DBFactory.php');
class billetModel extends DBFactory {
    public function checkBillet($donnees){
        $req = $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM news ORDER BY dateAjout DESC LIMIT 0, 5');
        $req->execute(['donnees' => $donnees]);
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;
        //
        
    }
    public function userRole(){
        $reqUser = $this->db->prepare('SELECT role_user FROM users');
    }
}
/* require ('./DBFactory.php');
class newsBillet {
    private $id;
    private $auteur;
    private $titre;
    private $contenu;
    private $dateAjout;
    private $dateModif;
    private $db;

    public function __construct()
    {   
        $newConnect = new DBFactory;
        $this->db = $newConnect->getMysqlConnexionWithPDO();
    }
    public function getId() {
        $req = $this->db->prepare('SELECT id FROM news');
        $req->execute();
        return $req->fetch();
    }
    public function getBilletById($id){
        $req = $this->db->prepare('SELECT * FROM news WHERE id = :id ');
        $req->execute(['id'=> $id]);
        return $req->fetch();
    }
}

 */