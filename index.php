<?php
require_once(getcwd() . '/controllers/homepageController.php');
require_once(getcwd() . '/controllers/securityController.php'); // Contient Login et Logout
require_once(getcwd() . '/controllers/billetController.php');
require_once(getcwd() . '/controllers/userController.php');
require_once(getcwd() . '/controllers/commentController.php');
require_once(getcwd() . '/controllers/adminController.php');

//
$homepageController = new homepageController;
$securityController = new securityController;
$billetController = new billetController;
$accountController = new userController;
$commentController = new commentController;
$adminController = new adminController;
//
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$request = $_SERVER['REQUEST_URI'];

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
    $billetController->billet();
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
    /* 
    a faire: Admin
    default:
    http_response_code(404);
    require __DIR__ . '/views/404.php';
    break; */
}
