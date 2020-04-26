<head>
    <?php require_once(getcwd() . '/views/headScript.php'); ?>
</head>
<?php require_once(getcwd() . '/views/header.php'); ?>
<?php /* require 'inc/header.php'; */ ?>
<div class="container">
    <div class="mx-auto" style="height: 5px;">
        <!--Espace vide pour séparer les divs-->
        <p></p>
    </div>
    <h1>S'inscrire</h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="" method="POST">

        <div class="form-group">
            <label for="">Pseudo</label>
            <input type="text" name="username" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Confirmez votre mot de passe</label>
            <input type="password" name="password_confirm" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">M'inscrire</button>
    </form>
</div>