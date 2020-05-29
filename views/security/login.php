<?php
$title = 'login';
ob_start(); ?>
<div class="container">
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
    <div class="mx-auto space_empty">
        <!--Espace vide -->
        <p></p>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>