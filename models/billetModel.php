<?php 
require_once(getcwd() . '/models/DBFactory.php');
class billetModel extends DBFactory {
    public function checkBillet($donnees){
        $req = $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM news ORDER BY dateAjout DESC LIMIT 0, 5');
        $req->execute($donnees);
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;
    }
    public function userRole($role){
        $reqUser = $this->db->prepare('SELECT role_user FROM users');
        $reqUser->execute(['role' => $role]);
        $role = $reqUser->fetch(PDO::FETCH_OBJ);
        return $role;
    }
}
