<?php
include_once '../entity/Usuario.class.php';
  require_once '../dao/Usuario.dao.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  
 $usuario = $_SESSION['usuario'];
 $idUsuario = $usuario->getIdUsuario();
 $operacao = $_GET['op'];
        
        
if($operacao == 'global'){
    $login = $_POST['login'];
    $idUsuario= $_POST['idUsuario'];
    $senha = $_POST['senha'];
    $email= $_POST['email'];
    $cpf = $_POST['cpf'];
    $idLogradouro = $_POST['idLogradouro'];
    
    
    if(isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] == 0){
        $fotoPerfil = $_FILES['fotoPerfil'];
    } else {
        $fotoPerfil = null;
    }
   
   
    $complemento = $_POST['complemento'];
    
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->atualizarPerfilGlobalUsuario($idUsuario, $login, $senha, $email, $fotoPerfil, $cpf, $complemento, $idLogradouro);
     $usuario = $usuarioDAO->getAutenticacaoUsuario($login, $senha);
               $_SESSION['usuario'] = null;
	   $_SESSION['usuario'] = $usuario;
    
    header("Location: /casaLimpa/pages/meuPerfil.php");

}

if($operacao == 'insertPrestadorServico'){
    $nome = $_POST['nome'];
    $telefone= $_POST['telefone'];
    $registroSalarial = $_POST['registro_salarial'];
    $areaAtuacao= $_POST['area_atuacao'];
    
    
                
   
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->inserirPerfilProfUsuario($idUsuario, $nome, $telefone, $registroSalarial, $areaAtuacao);
    header("Location: /casaLimpa/pages/meuPerfil_prestador.php");

}


if($operacao == 'insertCliente'){
    $nome = $_POST['nome'];
    $telefone= $_POST['telefone'];
    $dtNascimento = $_POST['data_nascimento'];
    $dtNascimentoSQL = date('Y-m-d', $dtNascimento);
    
                
   
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->inserirPerfilClienteUsuario($idUsuario, $nome, $telefone, $dtNascimentoSQL);
    header("Location: /casaLimpa/pages/meuPerfil_cliente.php");

}




if($operacao == 'alterCliente'){
    $nome = $_POST['nome'];
    $telefone= $_POST['telefone'];
    $dtNascimento = $_POST['data_nascimento'];
    $dtNascimentoSQL = join('-',array_reverse(explode('/',$dtNascimento)));
    
    
                
   
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->alterarPerfilClienteUsuario($idUsuario, $nome, $telefone, $dtNascimentoSQL);
    header("Location: /casaLimpa/pages/meuPerfil_cliente.php");

}
if($operacao == 'alterPrestadorServico'){
    $nome = $_POST['nome'];
    $telefone= $_POST['telefone'];
    $registroSalarial = $_POST['registro_salarial'];
    $areaAtuacao= $_POST['area_atuacao'];
    
    
                
   
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->alterarPerfilProfissionalUsuario($idUsuario, $nome, $telefone, $registroSalarial, $areaAtuacao);
    header("Location: /casaLimpa/pages/meuPerfil_prestador.php");

}
    
      
        
       