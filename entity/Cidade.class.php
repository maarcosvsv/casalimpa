<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cidade
 *
 * @author Marcos Vasconcelos
 */
class Cidade {
    
    public $uf;
    public $idCidade;
    public $nomeCidade;
    
    function __construct($uf, $idCidade, $nomeCidade) {
        $this->uf = $uf;
        $this->idCidade = $idCidade;
        $this->nomeCidade = $nomeCidade;
    }
    
    function getUf() {
        return $this->uf;
    }

    function getIdCidade() {
        return $this->idCidade;
    }

    function getNomeCidade() {
        return $this->nomeCidade;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setIdCidade($idCidade) {
        $this->idCidade = $idCidade;
    }

    function setNomeCidade($nomeCidade) {
        $this->nomeCidade = $nomeCidade;
    }


    
}
