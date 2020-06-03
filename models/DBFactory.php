<?php

class DBFactory
{
  public function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
  }

}


/* DB hebergé
<?php
USE PDO;
class DBFactory
{
protected $db;
public function __construct() {
    try {
            $dbName = 'dbs476549';
            $host = 'db5000496779.hosting-data.io';
            $utilisateur = 'dbu829014';
            $motDePasse = 'Vetitilorler07@';
            $port='3306';
            $dns = 'mysql:host='.$host .';dbname='.$dbName.';port='.$port;
            $this->db = new PDO( $dns, $utilisateur, $motDePasse );
          } catch ( Exception $e ) {
            echo "Connection à la BDD impossible : ", $e->getMessage();
            die();
          }
	}
}
*/