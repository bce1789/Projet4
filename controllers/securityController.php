<?php
include(getcwd() . '/models/securityModel.php');
class securityController
{
    public function login()
    {
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
    public function signup()
    {
        if (isset($_SESSION['auth'])) {
            header('Location: /account');
            exit;
        }
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $errors = array();
            
                $login = new securityModel;
                $user = $login->login($_POST['username']);
                if ($user) {
                    $errors['username'] = 'Ce pseudo est déjà pris';
                    /* header('location: /signup');
                    exit; */
                }
                $user = $login->login($_POST['email']);
                if ($user) {
                    $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
                   /*  header('location: /signup');
                    exit; */
                }

            if (empty($errors)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $signup = new securityModel;
                $signup->signup($password, $_POST['username'], $_POST['email']) ;
                $_SESSION['flash']['success'] = 'Votre compte à bien été crée';
                header('Location: /login');
                exit;
            } else {
                $_SESSION['flash']['success'] = 'Votre création de compte contient des erreurs ou des éléments non renseigné';
               
                header('Location: /signup');
            }
        } else {
            $_SESSION['flash']['danger'] = 'Votre création de compte contient des erreurs ou des éléments non renseigné';
            
            //header('Location: /signup');
        }
    include(getcwd() . '/views/security/signup.php');
    }
}
// rajouter en IF confirmation MDP
