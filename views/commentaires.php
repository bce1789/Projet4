<?php
$title = 'commentaires';
ob_start(); ?>
<div class="container">
    <h3><?php echo $billet->titre;?></h3>
    <br>
    <?php echo $billet->contenu; ?>
    <p><br></p>
    <h3>Liste des commentaires</h3>
    <?php
    while ($donnee = $donnees->fetch()){ ?>
        <p>De <em><?php echo htmlspecialchars($donnee['username']);?></em>: <?php echo htmlspecialchars($donnee['commentaire']);?></p>
    <?php
    }
    ?>
</div>
<?php 
/* var_dump($id);
die; */
 ?>
<div class="container">
    <h3>Ajouter un commentaire</h3>
    <form method="post" action="/comment?<?php echo $id; ?>">
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