<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jean fort</title>

    <!-- Bootstrap core CSS -->
    <?php include_once ('headscript.php')?>
</head>

<div class="container">
    <header class="blog-header py-3 border-bottom">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <form name="redirect" action="index.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="Accueil">
                </form>
            </div>
            <div class="col-4 text-center">
                <h1 class="blog-header-logo text-dark" href="#">Jean Forteroche</h1>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#" aria-label="Recherche">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path>
                        <title>Recherche</title>
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <path d="M21 211-5.2-5.2"></path>
                    </svg>  
                </a>
                <form name="redirect" action="register.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="S'enregistrer">
                </form>
                <div class="mx-auto" style="width: 2px;">
                    <!--Espace vide pour séparer les divs-->
                    <p></p>
                </div>
                <form name="redirect" action="login.php" method="post">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" value="Login">
                </form>
            </div>   
        </div>
    </header>
</div>