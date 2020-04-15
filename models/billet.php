<?php 
require ('./DBFactory.php');
class Billet {
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

//faire appels a getbilletbyID dans billetControllers(controllers) etc...

//Créer dans models un fichier par lien avec la base de données ex billet, commentaires, users...