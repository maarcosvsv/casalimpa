<?php
        
    require_once '../dao/Servico.dao.php';
    require_once '../entity/Servico.class.php';
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        /*há erros a consertar nessa pagina*/
        $nome = $_POST['nome'];     
        $descricao = $_POST['descricao'];
        $dificuldade_servico = $_POST['dificuldade_servico'];

        $servico = new Servico(null, $nome, $descricao, $dificuldade_servico);
      
       $servicoDAO = new ServicoDAO();
       $servicoDAO->incluirServico($servico);