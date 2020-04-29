<?php
require_once(getcwd() . '/controllers/homepageController.php');
require_once(getcwd() . '/controllers/securityController.php'); // Contient Login et Logout
require_once(getcwd() . '/controllers/billetController.php');
require_once(getcwd() . '/controllers/userController.php');
require_once(getcwd() . '/controllers/commentController.php');
//
$homepageController = new homepageController;
$securityController = new securityController;
$billetController = new billetController;
$accountController = new userController;
$commentController = new commentController;
//
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$request = strtok($_SERVER["REQUEST_URI"], '?');
switch ($request) {
  case '/':
    require __DIR__ . '/views/homepage.php';
    break;
  case '':
    require __DIR__ . '/views/homepage.php';
    break;
  case '/login':
    $securityController->login();
    break;
  case '/billet':
    $billetController->findBillet();
    break;
  case '/logout':
    $securityController->logout();
    break;
  case '/signup':
    $securityController->signup();
    break;
  case '/home':
    $homepageController->homepage();
    break;
  case '/comment':
    $commentController->comment();
    break;
  case '/account':
    $accountController->account();
    break;
  case '/billet/create':
    $billetController->createBillet();
    break;
  case '/billet/update':
    $billetController->updateBillet();
    break;
  case '/billet/delete':
    $billetController->deleteBillet();
    break;

    /* 
    a faire: Admin
    default:
    http_response_code(404);
    require __DIR__ . '/views/404.php';
    break; */
}
