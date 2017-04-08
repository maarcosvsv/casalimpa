<?php
    require_once '../dao/Empregado.dao.php';
     require_once '../entity/Empregado.class.php';
      require_once '../entity/Usuario.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
      
//PAREI AQUI!
	$login = $_POST['login'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $docIdentificacao = $_POST['docIdentificacao'];
      
        $usuario = new Usuario($login, $senha, $email, null, '1', null);
        $empregado = new Empregado(null, null, null, null, $usuario, null);
        
        $empregadoDAO = new EmpregadoDAO();
        
        $empregadoDAO->incluirEmpregado($empregado);
        
        
        
        