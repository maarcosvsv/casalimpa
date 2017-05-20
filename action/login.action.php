<?php


      require_once '../entity/Usuario.class.php';
        require_once '../dao/Usuario.dao.php';


	$login = $_POST['loginUsuario'];
        $senha = $_POST['senhaUsuario'];
        
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getAutenticacaoUsuario($login, $senha);
          
        if($usuario == NULL ){
       header("Location: /casaLimpa/pages/login.php?login=false");
        }else{
            session_start();
	   $_SESSION['usuario'] = $usuario;
           header("Location: /casaLimpa/pages/dashboard.php?login=true");
          
        }
        
       
        
       