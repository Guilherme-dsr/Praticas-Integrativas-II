<?php

namespace App\Common;

class Environment {
  /**
   * Carregas as variáveis de ambiente
   * @param string $dir Caminho absoluto da pasta do arquivo .env
   */
  public static function load($dir) {
    if(!file_exists($dir . '/.env')) {
      return false;
    }

    $lines = file($dir . '/.env');
    foreach($lines as $line) {
      putenv(trim($line));
    }
  }
}