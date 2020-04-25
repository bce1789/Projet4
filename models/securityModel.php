<?php 
include(getcwd() . '/models/DBFactory.php');
class securityModel extends DBFactory {
    public function login($userName){
        $req = $this->db->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');
        $req->execute(['username' => $userName]);
        $user = $req->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}
