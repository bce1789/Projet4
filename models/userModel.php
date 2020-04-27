<?php 
require_once(getcwd() . '/models/DBFactory.php');
class userModel extends DBFactory { 
    public function user($password, $user_id){
                $req = $this->db->prepare('UPDATE users SET password = ? WHERE id = ?');
                $req->execute([$password, $user_id]);
                $user = $req->fetch(PDO::FETCH_OBJ);
                return $user;
    }
}