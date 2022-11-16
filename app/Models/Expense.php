<?php

namespace App\Models;

class Expense{
    private $descricao;
    private $idCategoria;
    private $valor;
    private $dataDespesa;

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getValor() {
        return $this->valor;
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