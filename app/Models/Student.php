<?php

namespace App\Models;

class Student {
    private $nome;
    private $email;
    private $rendimento;
    private $ativo;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strtolower($email);
    }

    public function getRendimento() {
        return $this->rendimento;
    }

    public function setRendimento($rendimento) {
        $this->rendimento = $rendimento;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

}

?>