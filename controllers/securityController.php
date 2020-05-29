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
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
            $errors = array();
            $login = new securityModel;
            $user = $login->login($_POST['username']);
            if ($user) {
                $errors['username'] = '';
                $_SESSION['flash']['danger'] = 'Ce pseudo est déjà pris' ;
            }
            $user = $login->login($_POST['email']);
            if ($user) {
                $errors['email'] = '';
                $_SESSION['flash']['danger'] = 'Cet email est déjà utilisé' ;
            }
            if (($_POST['password']) !== ($_POST['password_confirm'])) {
                $errors['password'] = '';
                $_SESSION['flash']['danger'] = 'Les mots de passe ne correspondent pas' ;
            }

            if (empty($errors)) {
                if (($_POST['password']) === ($_POST['password_confirm'])) {
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $signup = new securityModel;
                    $signup->signup($password, $_POST['username'], $_POST['email']);
                    $_SESSION['flash']['success'] = 'Votre compte à bien été crée';
                    header('Location: /login');
                    exit;
                }
            }
        } else {
            $_SESSION['flash']['primary'] = 'Tous les éléments du formulaire sont requis';
        }
        include(getcwd() . '/views/security/signup.php');
    }
}
