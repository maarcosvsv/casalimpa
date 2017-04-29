<?php
    require_once '../dao/Empregado.dao.php';
     require_once '../entity/Empregado.class.php';
      require_once '../entity/Usuario.class.php';
      require_once '../entity/Logradouro.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	$login = $_POST['login'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $docIdentificacao = $_POST['docIdentificacao'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $ddd = $_POST['dddTelefone'];
        $telefone = $_POST['telefone'];
        $nasc_dia = $_POST['nasc_dia'];
        $nasc_mes = $_POST['nasc_mes'];
        $nasc_ano = $_POST['nasc_ano'];
        $idLogradouro = $_POST['idLogradouro'];
        $complementoEndereco = $_POST['complemento'];
        $dataExpiracao = date('Y-m-d', strtotime("+90 days"));  
        $telefoneCompleto = $ddd.$telefone;
        
        $logradouro = new Logradouro($idLogradouro, null, null, null);
              
        $usuario = new Usuario(null, $login, $senha, $email, $dataExpiracao, 1, $complementoEndereco, $logradouro, null, $docIdentificacao);
        $empregado = new Empregado(null, $usuario, $nome, $telefoneCompleto, null, null);
        
        $empregadoDAO = new EmpregadoDAO();
        $empregadoDAO->incluirEmpregado($empregado);
        
        
        
	
        
        
        