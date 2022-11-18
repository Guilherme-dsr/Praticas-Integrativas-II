<?php

namespace App\Controllers;

use App\Database\Connection;
use App\Models\Expense;
use Exception;
use PDO;

class ExpensesController {

  public function index() {
    try {
        $sql = "SELECT despesas.*, categorias.nome as categoria FROM despesas INNER JOIN categorias ON despesas.id = categorias.id";
        $result = Connection::getInstance()->query($sql);
        $lista = $result->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação,
        foi gerado um LOG do mesmo, tente novamente mais tarde.";
    }
  }

  public function getExpensesByMonth($year = null, $month = null) {
    $year = $year ? $year : date("Y");
    $month = $month ? $month : date("m");
    try {
        $sql = "SELECT despesas.*, categorias.nome as categoria FROM despesas INNER JOIN categorias ON despesas.id = categorias.id WHERE YEAR(despesas.data_despesa) = $year AND MONTH(despesas.data_despesa) = $month";
        $result = Connection::getInstance()->query($sql);
        $lista = $result->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação,
        foi gerado um LOG do mesmo, tente novamente mais tarde.";
    }
  }

  public function create(Expense $expense) {
    $data = array();
    try {
      $sql = "INSERT INTO despesas(
        descricao,
        id_categoria,
        valor)
        VALUES (
        :descricao,
        :id_categoria,
        :valor)";

      $p_sql = Connection::getInstance()->prepare($sql);

      $p_sql->bindValue(":descricao", $expense->getDescricao());
      $p_sql->bindValue(":id_categoria", $expense->getIdCategoria());
      $p_sql->bindValue(":valor", $expense->getValor());
      $p_sql->execute();

      $data['msg'] = "Despesa criada com sucesso!";
      $data['success'] = true;
      return $data;
    } catch (Exception $e) {
      $data['msg'] = "Não foi possível cadastrar a despesa! {$e->getMessage()}";
      $data['success'] = false;
 
      return $data;
    }
  }

  public function update(Expense $expense, $id) {
    $data = array();
    try {
      $sql = "UPDATE despesas SET
        descricao = :descricao,
        id_categoria = :id_categoria,
        valor = :valor
        WHERE id = :id";

      $p_sql = Connection::getInstance()->prepare($sql);

      $p_sql->bindValue(":descricao", $expense->getDescricao());
      $p_sql->bindValue(":id_categoria", $expense->getIdCategoria());
      $p_sql->bindValue(":valor", $expense->getValor());
      $p_sql->bindValue(":id", $id);
      $p_sql->execute();
      $data['msg'] = "Despesa atualizada com sucesso!";
      $data['success'] = true;

      return $data;

    } catch (Exception $e) {
      $data['msg'] = "Não foi possível atualizar a despesa!";
      $data['success'] = false;

      return $data;
    }
  }

  public function delete($id) {
    $data = array();
    try {
      $sql = "DELETE FROM despesas WHERE id = :id";
      $p_sql = Connection::getInstance()->prepare($sql);

      $p_sql->bindValue(":id", $id);
      $p_sql->execute();
      $data['msg'] = "Despesa deletada com sucesso!";
      $data['success'] = true;

      return $data;
    } catch (Exception $e) {
      $data['msg'] = "Não foi possível deletar a despesa!";
      $data['success'] = false;
      
      return $data;
    } 
  }
}