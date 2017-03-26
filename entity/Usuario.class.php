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
    
    public $login;
    public $senha;
    public $email;
    public $expiracao;
    public $situacao;
    public $fotoPerfil;
   
    function __construct($login, $senha, $email, $expiracao, $situacao, $fotoPerfil) {
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
        $this->expiracao = $expiracao;
        $this->situacao = $situacao;
        $this->fotoPerfil = $fotoPerfil;
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



    
}
