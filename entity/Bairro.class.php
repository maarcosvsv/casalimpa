<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bairro
 *
 * @author Marcos Vasconcelos
 */
class Bairro {
    public $idBairro;
    public $nomeBairro;
    public $cidade;
    
    function __construct($idBairro, $nomeBairro, $cidade) {
        $this->idBairro = $idBairro;
        $this->nomeBairro = $nomeBairro;
        $this->cidade = $cidade;
    }
    
    function getIdBairro() {
        return $this->idBairro;
    }

    function getNomeBairro() {
        return $this->nomeBairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function setIdBairro($idBairro) {
        $this->idBairro = $idBairro;
    }

    function setNomeBairro($nomeBairro) {
        $this->nomeBairro = $nomeBairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }


}
