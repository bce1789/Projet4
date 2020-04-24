<?php 
require ('./DBFactory.php');
class Users {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role_user;
    private $db;

    public function __construct()
    {   
        $newConnect = new DBFactory;
        $this->db = $newConnect->getMysqlConnexionWithPDO();
    }
    public function getId() {
        $req = $this->db->prepare('SELECT id FROM users');
        $req->execute();
        return $req->fetch();
    }
    public function getUsersById($id){
        $req = $this->db->prepare('SELECT * FROM users WHERE id = :id ');
        $req->execute(['id'=> $id]);
        return $req->fetch();
    }
}
