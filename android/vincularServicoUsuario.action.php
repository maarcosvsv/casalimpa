<?php
include_once '../entity/Usuario.class.php';
  require_once '../dao/Servico.dao.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 $usuario = $_SESSION['usuario'];
 $idUsuario = $usuario->getIdUsuario();
  
 $imagemServico = $_FILES['imagemServico'];

 	$idCategoriaServico = $_POST['idCategoriaServico'];
        $prazoServico = $_POST['prazoServico'];
        $preco = $_POST['preco'];
        $observacoes = $_POST['observacoes'];
        
        
  $servicoDAO = new ServicoDAO();
      
  $resultado = $servicoDAO->vincularServicoUsuario($idCategoriaServico, $prazoServico, $preco, $observacoes, $idUsuario, $imagemServico) ;  
        if( $resultado  == true ){
      header("Location: /casaLimpa/pages/listaServicos.php");
        }else{
         header("Location: /casaLimpa/pages/vincularServicoUsuario.php");
          
        }
       
       
        
       