<?php
include(getcwd() . '/models/securityModel.php');
class securityController
{
    public function signup()
    {
        include(getcwd() . '/views/signup.php');
    }
    public function login()
    {
        
        //reconnect_from_cookie();
        if (isset($_SESSION['auth'])) {
            header('Location: /account');
            exit;

        }
        include(getcwd() . '/views/login.php');
        
        if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $login = new securityModel;
            $user = $login->login($_POST['username']);
            if ($user == null) {
                $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            } elseif (password_verify($_POST['password'], $user->password)) {
                $_SESSION['auth'] = $user;
                $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
                header('Location: /account');
                exit();
            } else {
                $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            }
        }
    }
    public function logout()
    {
        include(getcwd() . '/views/logout.php');
    }
}
