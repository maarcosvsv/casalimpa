<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UF
 *
 * @author Marcos Vasconcelos
 */
class UF {
   
    
    private $siglaUf;
    private $nomeEstado;
    
    
    function __construct($siglaUf, $nomeEstado) {
        $this->siglaUf = $siglaUf;
        $this->nomeEstado = $nomeEstado;
    }
    
    function getSiglaUf() {
        return $this->siglaUf;
    }

    function getNomeEstado() {
        return $this->nomeEstado;
    }

    function setSiglaUf($siglaUf) {
        $this->siglaUf = $siglaUf;
    }

    function setNomeEstado($nomeEstado) {
        $this->nomeEstado = $nomeEstado;
    }



}
