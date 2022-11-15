<?php

namespace App\Database;

use PDO;

class Connection {
  public static $instance;

  public static function getInstance() {
    if(!isset(self::$instance)) {
      self::$instance = new PDO("mysql:host=localhost;dbname=republica", 'root', '');
    }

    return self::$instance;
  }
}