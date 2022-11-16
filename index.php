<?php

require __DIR__ . '/vendor/autoload.php';

use App\Common\Environment;
use App\Database\Connection;
use App\Controllers\StudentsController;
use App\Controllers\ExpenseController;
use App\Models\Expense;
use App\Models\Student;

Environment::load(__DIR__);

Connection::getInstance();

$routesCollection = [
  "get" => [
    "/",
    "/students",
    "/expense"
  ],
  "post" => [
    "/students",
    "/expense"
  ],
  "put" => [
    "/students",
    "/expense"
  ],
  "delete" => [
    "/students",
    "/expense"
  ]
];

$method = strtolower($_SERVER['REQUEST_METHOD']);
$uri = $_SERVER['REQUEST_URI'];

if(!in_array($uri, $routesCollection[$method])) {
  echo 'Rota não existente!';
  return false;
}

switch($method) {
  case 'get':
    if($uri == '/students'){
      $studentsController = new StudentsController();
      $resultado = $studentsController->index();
      echo json_encode($resultado);
    }
    if($uri == '/expense'){
      $expenseController = new ExpenseController();
      $resultado = $expenseController->index();
      echo json_encode($resultado);
    }
    break;

  case 'post':
    if($uri == '/students'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);

      $student = new Student();
      $student->setNome($data->nome);
      $student->setEmail($data->email);
      $student->setRendimento($data->rendimento);
      $student->setAtivo($data->ativo);
      
      $studentsController = new StudentsController();
      $resultado = $studentsController->create($student);
      echo($resultado['msg']);
    }

    if($uri == '/expense'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);

      $expense = new Expense();
      $expense->setDescricao($data->descricao);
      $expense->setIdCategoria($data->id_categoria);
      $expense->setValor($data->valor);

      $expenseController = new ExpenseController();
      $resultado = $expenseController->create($expense);
      echo($resultado['msg']);
    }
    break;

  case 'put':
    if($uri == '/students'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $id = $data->id;

      $student = new Student();
      $student->setNome($data->nome);
      $student->setEmail($data->email);
      $student->setRendimento($data->rendimento);
      $student->setAtivo($data->ativo);
      
      $studentsController = new StudentsController();
      $resultado = $studentsController->update($student, $id);
      echo($resultado['msg']);
    }

    if($uri == '/expense'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $id = $data->id;

      $expense = new Expense();
      $expense->setDescricao($data->descricao);
      $expense->setIdCategoria($data->id_categoria);
      $expense->setValor($data->valor);

      $expenseController = new ExpenseController();
      $resultado = $expenseController->update($expense, $id);
      echo($resultado['msg']);
    }
    break;

  case 'delete':
    if($uri == '/students'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $id = $data->id;

      $studentsController = new StudentsController();
      $resultado = $studentsController->delete($id);
      echo($resultado['msg']);
    }

    if($uri == '/expense'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $id = $data->id;

      $expenseController = new ExpenseController();
      $resultado = $expenseController->delete($id);
      echo($resultado['msg']);
    }
    break;

  default:
    break;
}