<?php

$title = 'commentaires'; ?>

<?php ob_start(); ?>
<h1>Page des commentaires</h1>
<?php
echo htmlspecialchars($dataName->username);
foreach ($donnees as $donnee)  {
echo htmlspecialchars($donnee);


}
?>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>