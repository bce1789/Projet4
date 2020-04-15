<?php
require_once 'inc/functions.php';
require_once 'models/DBFactory.php';
//require_once 'models/db.php';
reconnect_from_cookie();
if (isset($_SESSION['auth'])) {
    header('Location: account.php');
    exit();
}
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $newConnect = new DBFactory;
    $pdo = $newConnect->getMysqlConnexionWithPDO();
    $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if ($user == null) {
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    } elseif (password_verify($_POST['password'], $user->password)) {
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        header('Location: /p4_coste_benoit/index.php?action=account');
        exit();
    } else {
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}
?>

<head>
    <?php require_once('inc/headScript.php'); ?>
</head>

<body>
    <?php require 'inc/header.php'; ?>

    <h1>Se connecter</h1>

    <form action="" method="POST">
        <div class="form-group">
            <label for="">Pseudo ou email</label>
            <input type="text" name="username" class="form-control" />
        </div>
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>

    </form>
</body>
<?php require 'inc/footer.php'; ?>