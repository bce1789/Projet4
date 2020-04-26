<?php 
include(getcwd() . '/models/billetModel.php');
class billetController {
    public function billet(){
       include (getcwd().'/views/billet.php');
    }
}