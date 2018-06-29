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
        $telefone = $_POST['telefone'];
        $dataNascimento = $_POST['data_nascimento'];
        $dataNascimentoSQL = join('-',array_reverse(explode('/',$dataNascimento)));
 
        $idLogradouro = $_POST['idLogradouro'];
        $complementoEndereco = $_POST['complemento'];
        $tipoUsuario = $_POST['tipoUsuario'];
  
        $dataExpiracao = date('Y-m-d', strtotime("+90 days"));  
        $telefoneCompleto = $telefone;
        
        $logradouro = new Logradouro($idLogradouro, null, null, null);
              
        $usuario = new Usuario(null, $login, $senha, $email, $dataExpiracao, 1, $complementoEndereco, $logradouro, null, $docIdentificacao);
        $empregado = new Empregado(null, $usuario, $nome, $telefoneCompleto, null, null);
        $error = false;
        
		/*if($tipoUsuario == "EMPREGADO"){
        $empregadoDAO = new EmpregadoDAO();
        $error = $empregadoDAO->incluirEmpregado($empregado);
        }else {
            $empregadoDAO = new EmpregadoDAO();
          $error = $empregadoDAO->incluirEmpregador($usuario, $nome, $telefoneCompleto, $dataNascimentoSQL);
		  
        }*/
		$empregadoDAO = new EmpregadoDAO();
		 $error = $empregadoDAO->salvarEmpregadoEmpregador($empregado, $nome, $telefoneCompleto, $dataNascimentoSQL);
		
		$resultdb = "false";
		
        if($error == true){
		$resultdb = "true";
		}
		$result['result'] = $resultdb;
		
		 
		 echo json_encode($result, JSON_UNESCAPED_UNICODE );
		 
       
        
        ?>
