<?php
require 'tools/functions.php';
include(getcwd() . '/models/userModel.php');
class accountController
{
    public function account()
    {
        logged_only();
        include(getcwd() . '/views/account.php');
        if (!empty($_POST)) {

            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
                $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
            } else {
                $user_id = $_SESSION['auth']->id;
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                /* require_once 'inc/db.php';
                $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]); */
                $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
            }
        }
    }
}
// requéte SQL a passer ds le modél (usermodel)