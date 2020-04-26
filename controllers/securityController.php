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
        
        if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $login = new securityModel;
            $user = $login->login($_POST['username']);
            if ($user == null) {
                $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            } elseif (password_verify($_POST['password'], $user->password)) {
                $_SESSION['auth'] = $user;
                $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
                header('Location: /login');
                exit;
            } else {
                $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
                
            }
            header('Location: /login');
            exit;
        } 
        include(getcwd() . '/views/security/login.php');
    }
    
    public function logout()
    {
        unset($_SESSION['auth']);
        header('Location: /login');
    }
}
