<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="navbar-brand" href="/home">Accueil<span class="sr-only">(current)</span></a>
        </li>
        <?php if (isset($_SESSION['auth'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Se déconnecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/billet">Billet</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="/signup">S'inscrire</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/billet">Billet</a>
            </li>
    </ul>
<?php endif; ?>
</nav>
<!-- -->
<div class="container">
    <?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
</div>