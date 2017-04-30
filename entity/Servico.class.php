<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servico
 *
 * @author daniel
 */
class Servico {
    
    public $cod_categoria_servico;
    public $nome;
    public $descricao;
    public $dificuldadeservico;
    function __construct($cod_categoria_servico, $nome, $descricao, $dificuldadeservico) {
        $this->cod_categoria_servico = $cod_categoria_servico;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dificuldadeservico = $dificuldadeservico;
    }
    function getCod_categoria_servico() {
        return $this->cod_categoria_servico;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDificuldadeservico() {
        return $this->dificuldadeservico;
    }

    function setCod_categoria_servico($cod_categoria_servico) {
        $this->cod_categoria_servico = $cod_categoria_servico;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDificuldadeservico($dificuldadeservico) {
        $this->dificuldadeservico = $dificuldadeservico;
    }
}
