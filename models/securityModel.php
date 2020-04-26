<?php 
require_once(getcwd() . '/models/DBFactory.php');
class securityModel extends DBFactory {
    public function login($userName){
        $req = $this->db->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');
        $req->execute(['username' => $userName]);
        $user = $req->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    public function signup($password, $userName, $email){
        $req = $this->db->prepare("INSERT INTO users SET username = :username, password = :password, email = :email"); 
        $req->execute(['username' => $userName, 'password' => $password, 'email' =>$email]);
    }
}
