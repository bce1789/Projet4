<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog de Jean Forteroche</title>
    <meta name="description" content="Blog de Jean Forteroche">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<!--  -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <form name="redirect" action="../index.php" method="post">
        <input class="navbar-brand" type="submit" value="Accueil">
    </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="mx-auto" style="width: 50px;">
        <!--Espace vide -->
        <p></p>
    </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <div id="navbar" class="collapse navbar-collapse">
        <?php if (isset($_SESSION['auth'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Se déconnecter</a>
            </li>
        <?php else: ?>  
            <li class="nav-item">
                <form name="redirect" action="../register.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="S'inscrire">
                </form>
                <!--<a href="register.php">S'inscrire</a>-->
            </li>
                <div class="mx-auto" style="width: 50px;">
                    <!--Espace vide -->
                    <p></p>
                </div>
            <li class="nav-item">
                <form name="redirect" action="../login.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="Se connecter">
                </form>
            </li>
            <div class="mx-auto" style="width: 50px;">
                    <!--Espace vide -->
                    <p></p>
            </div>
        <?php endif; ?>
    </div><!--/.nav-collapse -->
      
    <div class="mx-auto" style="width: 50px;">
            <!--Espace vide -->
            <p></p>
    </div>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<!-- -->


<div class="container">

<?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

