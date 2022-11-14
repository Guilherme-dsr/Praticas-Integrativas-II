<?php

require __DIR__ . '/vendor/autoload.php';

use App\Common\Environment;

Environment::load(__DIR__);

// $env = getenv();
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
// exit;

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

switch($method) {
  case 'get':
    if(!$routesCollection[$method][array_search($uri, $routesCollection)]) {
      return false;
    }
    echo 'é um get';
    break;

  case 'post':
    if(!$routesCollection[$method][array_search($uri, $routesCollection)]) {
      return false;
    }
    echo 'é um post';
    break;

  case 'put':
    if(!$routesCollection[$method][array_search($uri, $routesCollection)]) {
      return false;
    }
    echo 'é um put';
    break;

  case 'delete':
    if(!$routesCollection[$method][array_search($uri, $routesCollection)]) {
      return false;
    }
    echo 'é um delete';
    break;

  default:
    break;
}