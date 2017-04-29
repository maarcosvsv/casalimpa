<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Marcos Vasconcelos
 */
class Usuario {
    
    public $idUsuario;
    public $login;
    public $senha;
    public $email;
    public $expiracao;
    public $situacao;
    public $complementoEndereco;
    public $logradouro;
    public $docIdentificacao;
    public $fotoPerfil;
   
    function __construct($idUsuario, $login, $senha, $email, $expiracao, $situacao, $complementoEndereco, $logradouro, $fotoPerfil,$docIdentificacao) {
        $this->idUsuario = $idUsuario;
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
        $this->expiracao = $expiracao;
        $this->situacao = $situacao;
        $this->complementoEndereco = $complementoEndereco;
        $this->logradouro = $logradouro;
        $this->fotoPerfil = $fotoPerfil;
        $this->docIdentificacao = $docIdentificacao;
        
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getComplementoEndereco() {
        return $this->complementoEndereco;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setComplementoEndereco($complementoEndereco) {
        $this->complementoEndereco = $complementoEndereco;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

        
    
    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getExpiracao() {
        return $this->expiracao;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setExpiracao($expiracao) {
        $this->expiracao = $expiracao;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function getFotoPerfil() {
        return $this->fotoPerfil;
    }

    function setFotoPerfil($fotoPerfil) {
        $this->fotoPerfil = $fotoPerfil;
    }

    function getDocIdentificacao() {
        return $this->docIdentificacao;
    }

    function setDocIdentificacao($docIdentificacao) {
        $this->docIdentificacao = $docIdentificacao;
    }




    
}
