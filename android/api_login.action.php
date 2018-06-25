<?php


      require_once '../entity/Usuario.class.php';
        require_once '../dao/Usuario.dao.php';


		$login = $_POST['login'];
        $senha = $_POST['senha'];
        
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getAutenticacaoUsuario($login, $senha);
          
		  
		 $result['result'] = "false";
        if($usuario != NULL ){
           $result['result'] = "true";
		   $result['idUsuario'] = $usuario->getIdUsuario();
		
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE );
       
        
       