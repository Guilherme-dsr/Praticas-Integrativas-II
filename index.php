<?php

require __DIR__ . '/vendor/autoload.php';

use App\Common\Environment;
use App\Database\Connection;

Environment::load(__DIR__);

Connection::getInstance();

// $env = getenv();

$routesCollection = [
  "get" => [
    "/",
    "/alunos",
    "/despesas"
  ],
  "post" => [
    "/alunos",
    "/despesas"
  ],
  "put" => [
    "/alunos",
    "/despesas"
  ],
  "delete" => [
    "/alunos",
    "/despesas"
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
    echo 'é um get';
    break;

  case 'post':
    echo 'é um post';
    break;

  case 'put':
    echo 'é um put';
    break;

  case 'delete':
    echo 'é um delete';
    break;

  default:
    break;
}