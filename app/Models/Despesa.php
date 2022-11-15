<?php

namespace App\Models;

class Despesa{
    private $descricao;
    private $categoria;
    private $valor;
    private $dataDespesa;

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getCategoria() {
        return $this->email;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getValor() {
        return $this->rendimento;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getDataDespesa() {
        return $this->dataDespesa;
    }

    public function setDataDespesa($dataDespesa) {
        $this->dataDespesa = $dataDespesa;
    }

}

?>