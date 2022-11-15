<?php

namespace App\Controllers;

use App\Database\Connection;
use PDO;

class ExpenceController {

  public function index() {
    try {
        $sql = "SELECT * FROM despesas";
        $result = Connection::getInstance()->query($sql);
        $lista = $result->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação,
        foi gerado um LOG do mesmo, tente novamente mais tarde.";
    }
  }

  public function create() {
    
  }

  public function update() {}

  public function delete() {}
}