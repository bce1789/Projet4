<?php
$title = 'commentaires';
ob_start(); ?>
<div class="container">
    <h3><?php echo $billet->titre; ?></h3>
    <br>
    <?php echo $billet->contenu; ?>
    <p><br></p>
    <h3>Liste des commentaires</h3>
    <?php
    while ($donnee = $donnees->fetch()) {
        ?>
        <p>De <em><?php echo htmlspecialchars($donnee['username']); ?></em>: <?php echo htmlspecialchars($donnee['commentaire']); ?>
            <?php
            if (isset($_SESSION['auth'])  && $_SESSION['auth']->role_user) { ?>
                <a href="/comment/delete?<?php echo $donnee['id']; ?>">
                    <input type="submit" class="btn-sm btn btn-danger" value="supprimer" />
                </a>

                <?php }
            if ($donnee['alerte'] != 1) {
                if (isset($_SESSION['auth'])) {
                    if (!$_SESSION['auth']->role_user) {
                ?>
                        <a href="/comment/signal?<?php echo $donnee['id']; ?>">
                            <input type="submit" class="btn-sm btn btn-danger" value="Signaler" />
                        </a>
        </p>
<?php }
                }
            } elseif ($_SESSION['auth']->role_user) { ?>
<input type="submit" class="btn-sm btn btn-warning" value="Contenu signalé" />
<p></p>
<?php
            }
?>
<?php
    }
?>
</div>
<div class="container">
    <h3>Ajouter un commentaire</h3>
    <form method="post" action="/comment/create?<?php echo $id_billet; ?>">
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