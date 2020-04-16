<?php 
require_once (getcwd().'/controllers/homepageController.php');
require_once (getcwd().'/controllers/securityController.php');
require_once (getcwd().'/controllers/loginController.php');
require_once (getcwd().'/controllers/logoutController.php');
require_once (getcwd().'/controllers/billetController.php');
require_once (getcwd().'/controllers/accountController.php');
require_once (getcwd().'/controllers/commentController.php');
require_once (getcwd().'/controllers/adminController.php');

//
$homepageController = new homepageController;
$securityController = new securityController;
$loginController = new loginController;
$logoutController = new logoutController;
$billetController = new billetController;
$accountController = new accountController;
$commentController = new commentController;
$adminController = new adminController;
//
if (!isset($_GET['action'])){
  $homepageController -> homepage();  
}
else {
  if ($_GET['action'] == 'signup') {
    $securityController -> signup();
  }
  if ($_GET['action'] == 'login') {
    $loginController -> login();
  }
  if ($_GET['action'] == 'logout') {
    $logoutController -> logout();
  }
  if ($_GET['action'] == 'billet') {
    $billetController -> billet();
  }
  if ($_GET['action'] == 'account') {
    $accountController -> account();
  }
  if ($_GET['action'] == 'comment') {
    if (isset($_GET['billet'])){
      $commentController -> comment();
    }
  }
  if ($_GET['action'] == 'admin') {
    $adminController -> admin();
  }
}
//rooter