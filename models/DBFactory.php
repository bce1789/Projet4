<?php

class DBFactory
{
  public function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
    /* $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); */
  }
 /*  public static function getMysqlConnexionWithMySQLi()
  {
    return new MySQLi('localhost', 'root', '', 'news');
  } */
}