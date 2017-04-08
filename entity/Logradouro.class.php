<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logradouro
 *
 * @author Marcos Vasconcelos
 */
class Logradouro {
    
    public $idLogradouro;
    public $nomeLogradouro;
    public $cepLogradouro;
    public $bairro;
    
    function __construct($idLogradouro, $nomeLogradouro, $cepLogradouro, $bairro) {
        $this->idLogradouro = $idLogradouro;
        $this->nomeLogradouro = $nomeLogradouro;
        $this->cepLogradouro = $cepLogradouro;
        $this->bairro = $bairro;
    }

    
    function getIdLogradouro() {
        return $this->idLogradouro;
    }

    function getNomeLogradouro() {
        return $this->nomeLogradouro;
    }

    function getCepLogradouro() {
        return $this->cepLogradouro;
    }

    function getBairro() {
        return $this->bairro;
    }

    function setIdLogradouro($idLogradouro) {
        $this->idLogradouro = $idLogradouro;
    }

    function setNomeLogradouro($nomeLogradouro) {
        $this->nomeLogradouro = $nomeLogradouro;
    }

    function setCepLogradouro($cepLogradouro) {
        $this->cepLogradouro = $cepLogradouro;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }


}
