<?php

$title = 'commentaires'; ?>

<?php ob_start(); ?>
<h1>Page des commentaires</h1>


<?php
foreach ($donnees as $donnee)  {
    ?><p><strong><?php echo htmlspecialchars($dataName); ?>
    </strong> le <?php echo $donnees['date_commentaire_fr']; ?>
    <?php echo htmlspecialchars($donnee);
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>