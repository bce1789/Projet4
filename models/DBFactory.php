<?php

class DBFactory
{
  public function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=p_4', 'root', '');
  }

}
