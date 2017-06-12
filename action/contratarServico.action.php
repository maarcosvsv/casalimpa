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

 $horario = $_POST['horario'];
 $numeroOS = $idUsuario.date('dmyHis');
 echo $numeroOS;
    $dataInicioSQL = date('Y-m-d', strtotime($dataInicio));
$dataFimSQL = date('Y-m-d', strtotime($dataFim));
 
$servicoDAO = new ServicoDAO();
       $resultado = $servicoDAO->contratarServico($idUsuario, $codServico, $dataInicioSQL, $dataFimSQL, $turnoPreferencia, $idLogradouro, $horario, $numeroOS) ;  
       if( $resultado  == true ){
      header("Location: /casaLimpa/pages/listaServicos.php");
        }else{
         echo 'erro';
          
        }

      
        
       