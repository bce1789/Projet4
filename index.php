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
    $commentController->findComment();
    break;
  case '/account':
    $accountController->account();
    break;
  case '/comment/signal':
    $commentController->signalComment();
    break;

  default:
    if ($_SESSION['auth']) {
      switch ($request) {
        case '/comment/create':
          $commentController->createComment();
          break;
      }
    }
    if ($_SESSION['auth']->role_user) {
      switch ($request) {
        case '/billet/create':
          $billetController->createBillet();
          break;
        case '/billet/update':
          $billetController->updateBillet();
          break;
        case '/billet/delete':
          $billetController->deleteBillet();
          break;
        case '/comment/delete':
          $commentController->deleteComment();
          break;
      }
    } else {
      require __DIR__ . '/views/404.php';
      break;
    }
}
