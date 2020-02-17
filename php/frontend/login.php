<?php
require_once 'functions.php';
reconnect_from_cookie();
if(isset($_SESSION['auth'])){
    header('Location: account.php');
    exit();
}
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'inc/db.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        $_SESSION['auth'] = $user;
$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
if($_POST['remember']){
    $remember_token = str_random(250);
    $pdo->prepare('UPDATE users SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
    setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'ratonlaveurs'), time() + 60 * 60 * 24 * 7);
}
        header('Location: account.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}
?>
<?php require 'header.php'; ?>

    <div class="row">
        <?php require_once('menu.php');?>
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                Se Connecter
            </h3>
        
            <form action="" method="POST">

                <div class="form-group">
                    <label for="">Pseudo ou email</label>
                    <input type="text" name="username" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="">Mot de passe <a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
                    <input type="password" name="password" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember" value="1"/> Se souvenir de moi
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>

            </form>
        </div>
    </div>

<?php require 'footer.php'; ?>