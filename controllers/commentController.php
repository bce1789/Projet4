<?php 
include(getcwd() . '/models/commentModel.php');
class commentController {
    public function comment(){
       include (getcwd().'/views/commentaires.php');
    }
    public function commentTitle(){
        $trackData = new commentModel;
        echo htmlspecialchars(utf8_decode($trackData['titre']));
          echo $trackData['date_creation_fr'];
    }
}