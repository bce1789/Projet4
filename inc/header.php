<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('inc/headScript.php');?>
    <title>Blog</title>
</head>

<body>
<!--  -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <div id="navbar" class="collapse navbar-collapse">
        <?php if (isset($_SESSION['auth'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Se déconnecter</a>
            </li>
        <?php else: ?>  
            <li class="nav-item">
                <form name="redirect" action="register.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="S'inscrire">
                </form>
                <!--<a href="register.php">S'inscrire</a>-->
            </li>
                <div class="mx-auto" style="width: 50px;">
                    <!--Espace vide -->
                    <p></p>
                </div>
            <li class="nav-item">
                <form name="redirect" action="login.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="Se connecter">
                </form>
            </li>
            <div class="mx-auto" style="width: 50px;">
                    <!--Espace vide -->
                    <p></p>
            </div>
            <li class="nav-item active">
                <form name="redirect" action="index.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="Accueil">
                </form>
            </li>
        <?php endif; ?>
    </div><!--/.nav-collapse -->
      
    <div class="mx-auto" style="width: 50px;">
            <!--Espace vide -->
            <p></p>
    </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
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

