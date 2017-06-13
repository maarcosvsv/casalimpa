<?php
include_once '../entity/Usuario.class.php';
  require_once '../dao/Servico.dao.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  
 $usuario = $_SESSION['usuario'];
 $idUsuario = $usuario->getIdUsuario();
  $operacao = $_GET['op'];
        $idOs = $_GET['idOs']; 
        
if($operacao == 'confirmarInscricaoOS'){
    
       $servicoDAO = new ServicoDAO();
       
      $resultado = $servicoDAO->confirmarRealizacaoServico($idOs) ;  
     
    header("Location: /casaLimpa/pages/visualizarOrdemServico.php?os=".$idOs);
       

}

if($operacao == 'confirmarRealizacaoAntecipada'){
   
       $servicoDAO = new ServicoDAO();
       
      $resultado = $servicoDAO->confirmarRealizacaoServico($idOs) ;  
     
    header("Location: /casaLimpa/pages/visualizarOrdemServico.php?os=".$idOs);
       

}

if($operacao == 'recusarServico'){
     
       $servicoDAO = new ServicoDAO();
       
      $resultado = $servicoDAO->recusarServico($idOs) ;  
     
    header("Location: /casaLimpa/pages/visualizarOrdemServico.php?os=".$idOs);
       

}

if($operacao == 'avaliacaoCliente'){
     
        $idOs = $_POST['idOs'];
       $mediaSatisfatoria = $_POST['mediaSatisfatoria'];
       $consideracoes = $_POST['consideracoes'];
       $servicoDAO = new ServicoDAO();
       
       $resultado = $servicoDAO->avaliarCliente($idOs, $mediaSatisfatoria, $consideracoes) ;  
     
       header("Location: /casaLimpa/pages/visualizarOrdemServico.php?os=".$idOs);
       

}

if($operacao == 'avaliacaoProfissional'){
     
       $idOs = $_POST['idOs'];
       $mediaSatisfatoria = $_POST['mediaSatisfatoria'];
       $consideracoes = $_POST['consideracoes'];
       $avaliacao = $_POST['avaliacao'];
       $servicoDAO = new ServicoDAO();
       
       $resultado = $servicoDAO->avaliarProfissional($idOs, $mediaSatisfatoria, $consideracoes, $avaliacao) ;  
     
       header("Location: /casaLimpa/pages/visualizarOrdemServico.php?os=".$idOs);
       

}

    
      
        
       