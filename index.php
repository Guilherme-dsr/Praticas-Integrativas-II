<?php

require __DIR__ . '/vendor/autoload.php';

use App\Common\Environment;
use App\Database\Connection;
use App\Controllers\StudentsController;
use App\Controllers\DespesasController;
use App\Models\Student;

Environment::load(__DIR__);

Connection::getInstance();

$routesCollection = [
  "get" => [
    "/",
    "/students",
    "/expence"
  ],
  "post" => [
    "/students",
    "/expence"
  ],
  "put" => [
    "/students",
    "/expence"
  ],
  "delete" => [
    "/students",
    "/expence"
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
      $var = new StudentsController();
      $resultado = $var->index();
      print_r($resultado);
    }
    if($uri == '/expence'){
      $var = new ExpenceController();
      $resultado = $var->index();
      print_r($resultado);
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
      
      $var = new StudentsController();
      $resultado = $var->create($student);
      echo($resultado['msg']);
    }
    // if($uri == '/expence'){
    //   $var = new ExpenceController();
    //   $resultado = $var->index();
    //   print_r($resultado);
    // }
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
      
      $var = new StudentsController();
      $resultado = $var->update($student, $id);
      echo($resultado['msg']);
    }
    break;

  case 'delete':
    if($uri == '/students'){
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $id = $data->id;

      $var = new StudentsController();
      $resultado = $var->delete($id);
      echo($resultado['msg']);
    }
    break;

  default:
    break;
}