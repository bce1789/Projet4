<?php 
include(getcwd() . '/models/billetModel.php');
class billetController {
    public function billet(){
        $seeBillet = new billetModel;
        $donnees = $seeBillet-> checkBillet();
        include (getcwd().'/views/billet.php');
        
    }
    
}