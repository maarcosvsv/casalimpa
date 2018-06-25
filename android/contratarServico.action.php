<?php
include_once '../entity/Usuario.class.php';
  require_once '../dao/Servico.dao.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    
 $usuario = $_SESSION['usuario'];
 $idUsuario = $usuario->getIdUsuario();
 
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
       if( $resultado  == true ){
      header("Location: /casaLimpa/pages/msg/sucessoContatarServico.php");
        }else{
         echo 'erro';
          
        }

      
        
       