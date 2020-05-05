<?php
// regroupé dans le model, un model ex: newsmanager, billet manager... 
//un fichier pour la connexion a la base de données dans manager 
//le tout dans le model


//faire appel a getbilletbyID dans billetControllers(controllers) etc...

//Créer dans models un fichier par lien avec la base de données ex billet, commentaires, users...

// from commentModel:
/* public function recupBillet()
    {
        $req = $this->db->prepare('SELECT titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM news WHERE id = ?');
        $req->execute(array($_GET['billet']));
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        return $donnees;
    } */