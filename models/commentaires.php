<?php 
require ('./DBFactory.php');
class Commentaires {
    private $id;
    private $id_billet;
    private $commentaire;
    private $date_commentaire;
    private $id_user;
    private $alerte;
    private $db;

    public function __construct()
    {   
        $newConnect = new DBFactory;
        $this->db = $newConnect->getMysqlConnexionWithPDO();
    }
    public function getId() {
        $req = $this->db->prepare('SELECT id FROM commentaires');
        $req->execute();
        return $req->fetch();
    }
    public function getUsersById($id){
        $req = $this->db->prepare('SELECT * FROM commentaires WHERE id = :id ');
        $req->execute(['id'=> $id]);
        return $req->fetch();
    }
}
