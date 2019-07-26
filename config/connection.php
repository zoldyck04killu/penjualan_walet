<?php

class Connection {

    private $host,
            $user,
            $pass,
            $db;

  function __construct($host, $user, $pass, $db){

    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->db   = $db;

    $this->conn = new mysqli ($this->host, $this->user, $this->pass, $this->db) or die (mysqli_error());

      if (!$this->conn) {
          return false;
      }
      else {
          return true;
      }
  }

} // end class
