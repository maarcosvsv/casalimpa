<?php
include_once '../entity/Usuario.class.php';
  require_once '../dao/Servico.dao.php';
    
 $idUsuario = $_POST['idUsuario'];
 $codServico = $_POST['codServico'];
 $dataInicio = $_POST['dataInicio'];
 $dataFim = $_POST['dataFim'];
 $turnoPreferencia =  $_POST['turnoPreferencia'];
 $idLogradouro = $_POST['idLogradouro'];
 $complemento = $_POST['complemento'];

 $horario = $_POST['horario'];
 $numeroOS = $idUsuario.date('dmyHis');

 $dataInicioSQL = join('-',array_reverse(explode('/',$dataInicio)));
 $dataFimSQL = join('-',array_reverse(explode('/',$dataFim)));
 
 
$servicoDAO = new ServicoDAO();
       $resultado = $servicoDAO->contratarServico($idUsuario, $codServico, $dataInicioSQL, $dataFimSQL, $turnoPreferencia, $idLogradouro, $horario, $numeroOS,$complemento) ;  
	   
	   $resultdb = "false";
		
        if($resultado == true){
		$resultdb = "true";
		}
		$result['result'] = $resultdb;
		
		 
		 echo json_encode($result, JSON_UNESCAPED_UNICODE );


      
        
       