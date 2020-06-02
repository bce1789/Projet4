<?php
$title = 'account';
ob_start(); ?>
<div class="container">
    <div class="mx-auto">
        <p><br></p>
    </div>
    <h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe" />
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe" />
        </div>
        <button class="btn btn-primary">Changer mon mot de passe</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>