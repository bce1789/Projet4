<?php

$title = 'commentaires'; ?>

<?php ob_start(); ?>
<div class="container">
    <h1>Page des commentaires</h1>
    <?php
    //while ($donnees = $req->fetch())
    foreach ($donnees as $donnee) { ?>
        <p>Par: <?php echo htmlspecialchars($dataName->username); ?></p>
        <p>Commentaires: <?php echo htmlspecialchars($donnees->commentaire); ?></p>
    <?php
    }
    ?>
</div>
<div class="container">
    <h1>Ajouter un commentaire</h1>
    <form method="post" action="/comment/create">
        <div class="form-group">
            <label for="commentaire">Entrez votre commentaire ci-dessous</label>
            <input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Quelques choses à ajouter?">
            <p></p>
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>