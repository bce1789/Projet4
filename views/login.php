<?php
// require_once 'inc/functions.php';
require_once 'models/DBFactory.php';

//require_once 'models/db.php';

?>


<head><?php require_once('views/headScript.php'); ?></head>

<body>
    <?php require 'views/header.php'; ?>
    <div class="container">
        <div class="mx-auto" style="height: 50px;">
            <!--Espace vide pour séparer les divs-->
            <p></p>
        </div>
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
    </div>

</body>