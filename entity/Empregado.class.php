<?php

    require_once 'Usuario.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empregado
 *
 * @author Marcos Vasconcelos
 */
class Empregado {
    
    public $idProfissional;
    public $usuario;
    public $nome;
    public $telefone;
    public $registro_salarial;
    public $area_atuacao;
   
    function __construct($idProfissional, $usuario, $nome, $telefone, $registro_salarial, $area_atuacao) {
        $this->idProfissional = $idProfissional;
        $this->usuario = $usuario;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->registro_salarial = $registro_salarial;
        $this->area_atuacao = $area_atuacao;
    }

    function getIdProfissional() {
        return $this->idProfissional;
    }

    function setIdProfissional($idProfissional) {
        $this->idProfissional = $idProfissional;
    }

        
    function getUsuario() {
        return $this->usuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getRegistro_salarial() {
        return $this->registro_salarial;
    }

    function getArea_atuacao() {
        return $this->area_atuacao;
    }



    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setRegistro_salarial($registro_salarial) {
        $this->registro_salarial = $registro_salarial;
    }

    function setArea_atuacao($area_atuacao) {
        $this->area_atuacao = $area_atuacao;
    }

  


    
}
