<?php
require_once(getcwd() . '/controllers/homepageController.php');
require_once(getcwd() . '/controllers/securityController.php');
/* require_once (getcwd().'/controllers/loginController.php');
require_once (getcwd().'/controllers/logoutController.php'); */
require_once(getcwd() . '/controllers/billetController.php');
require_once(getcwd() . '/controllers/accountController.php');
require_once(getcwd() . '/controllers/commentController.php');
require_once(getcwd() . '/controllers/adminController.php');

//
$homepageController = new homepageController;
$securityController = new securityController;
/* $loginController = new loginController;
$logoutController = new logoutController; */
$billetController = new billetController;
$accountController = new accountController;
$commentController = new commentController;
$adminController = new adminController;
//
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '/':
    require __DIR__ . '/views/index.php';
    break;
  case '':
    require __DIR__ . '/views/index.php';
    break;
  case '/login':
    $securityController->login();
    break;
  case '/billet':
    $billetController->billet();
    break;
    /*case '/signup':
    require __DIR__ . '/views/about.php';
    break;
  
  case '/admin':
    require __DIR__ . '/views/about.php';
    break;
  case '/commentaires':
    require __DIR__ . '/views/about.php';
    break; */
  case '/account':
    $accountController->account();
    break;
    /* default:
    http_response_code(404);
    require __DIR__ . '/views/404.php';
    break; */
}
////
////
///
//


/* 
if (!isset($_GET['action'])) {
  $homepageController->homepage();
} else {
  if ($_GET['action'] == 'signup') {
    $securityController->signup();
  }
  if ($_GET['action'] == 'login') {
    $loginController->login();
  }
  if ($_GET['action'] == 'logout') {
    $logoutController->logout();
  }
  if ($_GET['action'] == 'billet') {
    $billetController->billet();
  }
  if ($_GET['action'] == 'account') {
    $accountController->account();
  }
  if ($_GET['action'] == 'comment') {
    if (isset($_GET['billet'])) {
      $commentController->comment();
    }
  }
  if ($_GET['action'] == 'admin') {
    $adminController->admin();
  }
} */
//rooter
