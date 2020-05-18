<?php
$title = 'commentaires';
ob_start(); ?>
<div class="container">
    <h1>Page des commentaires</h1>
    <p><br></p>
    <h3>Liste des commentaires</h3>
    <?php
    //afficher billet
    /* var_dump ($billet);
    die; */
    while ($donnee = $donnees->fetch()){ ?>
    <?php //  echo htmlspecialchars($billet['contenu']); ?>
        <p>Par: <?php echo htmlspecialchars($donnee['username']); ?></p>
        <p>Commentaires: <?php echo htmlspecialchars($donnee['commentaire']); ?></p>
    <?php
    }
    ?>
</div>
<div class="container">
    <h3>Ajouter un commentaire</h3>
    <form method="post" action="/comment/create?<?php // echo $donnees->id; ?>">
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