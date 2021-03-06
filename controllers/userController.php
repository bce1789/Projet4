<?php
require 'tools/functions.php';
include(getcwd() . '/models/userModel.php');
class userController
{
    public function account()
    {
        logged_only();
        include(getcwd() . '/views/account.php');
        if (!empty($_POST)) {

            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
                $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
                header('location: /account');
                exit;
                
            } else {
                $user_id = $_SESSION['auth']->id;
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $userModel = new userModel;
                $userModel->user($password, $user_id);
                $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
                header('location: /account');
                exit;
            }
            //header('location: /account');
        }
    }
}
