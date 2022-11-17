<?php

namespace App\Database;

use PDO;

class Connection {
  public static $instance;

  public static function getInstance() {
    if(!isset(self::$instance)) {
      self::$instance = new PDO("mysql:host=".getenv('DB_HOST').";dbname=".getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'));
    }

    return self::$instance;
  }
}