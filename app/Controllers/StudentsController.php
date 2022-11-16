<?php

namespace App\Controllers;

use App\Database\Connection;
use App\Models\Student;
use Exception;
use PDO;

class StudentsController {

  public function index() {
    try {
        $sql = "SELECT * FROM pessoas";
        $result = Connection::getInstance()->query($sql);
        $lista = $result->fetchAll(PDO::FETCH_ASSOC);
 
        return $lista;
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação,
        foi gerado um LOG do mesmo, tente novamente mais tarde.";
    }
  }

  public function create(Student $student) {
    $data = array();
    try {
      $sql = "INSERT INTO pessoas(
          nome,
          email,
          rendimento,
          ativo)
          VALUES (
          :nome,
          :email,
          :rendimento,
          :ativo)";

      $p_sql = Connection::getInstance()->prepare($sql);

      $p_sql->bindValue(":nome", $student->getNome());
      $p_sql->bindValue(":email", $student->getEmail());
      $p_sql->bindValue(":rendimento", $student->getRendimento());
      $p_sql->bindValue(":ativo", $student->getAtivo());
      $p_sql->execute();

      $data['msg'] = "Estudante foi criado com sucesso!";
      $data['success'] = true;
      return $data;
    } catch (Exception $e) {
      $data['msg'] = "Estudante não foi Criado!";
      $data['success'] = false;
 
      return $data;
    }
  }

  public function update(Student $student, $id) {
    $data = array();
    try {
      $sql = "UPDATE pessoas SET
        nome = :nome,
        email = :email,
        rendimento = :rendimento,
        ativo = :ativo
        WHERE id = :id";

      $p_sql = Connection::getInstance()->prepare($sql);

      $p_sql->bindValue(":nome", $student->getNome());
      $p_sql->bindValue(":email", $student->getEmail());
      $p_sql->bindValue(":rendimento", $student->getRendimento());
      $p_sql->bindValue(":ativo", $student->getAtivo());
      $p_sql->bindValue(":id", $id);
      $p_sql->execute();
      $data['msg'] = "Estudante atualizado com sucesso!";
      $data['success'] = true;

      return $data;

    } catch (Exception $e) {
      $data['msg'] = "Estudante não foi atualizado!";
      $data['success'] = false;

      return $data;
    }
  }

  public function delete($id) {
    $data = array();
    try {
      $sql = "DELETE FROM pessoas WHERE id = :id";
      $p_sql = Connection::getInstance()->prepare($sql);

      $p_sql->bindValue(":id", $id);
      $p_sql->execute();
      $data['msg'] = "Estudante deletado com sucesso!";
      $data['success'] = true;

      return $data;
    } catch (Exception $e) {
      $data['msg'] = "Estudante não foi deletado!";
      $data['success'] = false;
      
      return $data;
    }    
  }
}