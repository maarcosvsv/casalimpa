<?php
    
    require_once '../entity/Usuario.class.php';
    require_once '../connectionFactory/connectionFactory.php';
    
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empregado
 *
 * @author Marcos Vasconcelos
 */
class UsuarioDAO {
   
    function getAutenticacaoUsuario($login, $senha) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
      
         $slq = " SELECT u.*, situacao.descricao as descricaoSituacao FROM usuario u "
                 . " inner join situacao_usuario situacao on situacao.idsituacao_usuario = "
                 . " u.idsituacao  WHERE login = '".$login."' and senha = '".$senha."'";
         $result = mysql_query($slq,  $connection);
        
    
        
   while ($row = mysql_fetch_assoc($result)) {
    
          $usuario = new Usuario(
                  $row['id_usuario'], 
                  $row['login'], 
                  $row['senha'], 
                  $row['email'], 
                  $row['expiracao'], 
                  $row['descricaoSituacao'], 
                  $row['complemento'], 
                  $row['tb_logradouro_PK_Logradouro'], 
                    $row['fotoPerfil'], 
                $row['cpf_cnpj'] );
            
         }

     
        $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return $usuario;
        }else{
            return NULL;
        }

}

function atualizarPerfilGlobalUsuario($idUsuario, $login, $senha, $email, $fotoPerfil, $cpf, $complemento, $idLogradouro) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
      
         $sqlUpdate= "update usuario set login = '".$login."'"
                 . ", senha = '".$senha."'"
                 . ",  email = '".$email."'";
                 if($fotoPerfil != null){
                    
                      $arquivo = $fotoPerfil['tmp_name'];
        $tamanho = $fotoPerfil['size'];
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
                     $sqlUpdate = $sqlUpdate . ",  fotoPerfil = '".$conteudo."'";
                 }
                   $sqlUpdate = $sqlUpdate . ",  cpf_cnpj = '".$cpf."'"
                 . ",  complemento = '".$complemento."'"
                 . ",  tb_logradouro_PK_Logradouro = ".$idLogradouro.""
                 . " where id_usuario = " . $idUsuario;  
        
     
        mysql_query($sqlUpdate, $connection);

      echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         
        $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return true;
        }else{
            return NULL;
        }

}

function alterarPerfilClienteUsuario($idUsuario, $nome, $telefone, $dtNascimentoSQL) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
      
         $sqlAlter = "update cliente set "
                 . " nome = '".$nome."'"
                 . ", telefone = '".$telefone."'"
                 . ", data_nascimento = '".$dtNascimentoSQL."'"
                 . "where id_usuario = ".$idUsuario;
        
     
        mysql_query($sqlAlter, $connection);

       $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return true;
        }else{
            return NULL;
        }

}

function alterarPerfilProfissionalUsuario($idUsuario, $nome, $telefone, $registroSalarial, $areaAtuacao) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
      
         $sqlAlter = "update profissional set "
                 . " nome = '".$nome."'"
                 . ", telefone = '".$telefone."'"
                 . ", registro_salarial = '".$registroSalarial."'"
                 . ", area_atuacao = '".$areaAtuacao."'"
                 . "where id_usuario = ".$idUsuario;
        
     
        mysql_query($sqlAlter, $connection);

       $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return true;
        }else{
            return NULL;
        }

}
function inserirPerfilClienteUsuario($idUsuario, $nome, $telefone, $dtNascimentoSQL) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
      
         $sqlInsert = "insert into cliente (nome, telefone, data_nascimento,  id_usuario) "
                 . "values ('".$nome."','".$telefone."','".$dtNascimentoSQL."',".$idUsuario.")";  
        
     
        mysql_query($sqlInsert, $connection);

       $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return true;
        }else{
            return NULL;
        }

}
function inserirPerfilProfUsuario($idUsuario, $nome, $telefone, $registroSalarial, $areaAtuacao) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
      
         $sqlInsert = "insert into profissional (nome, telefone, registro_salarial, area_atuacao, id_usuario) "
                 . "values ('".$nome."','".$telefone."','".$registroSalarial."','".$areaAtuacao."', ".$idUsuario.")";  
        
     
        mysql_query($sqlInsert, $connection);

       $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return true;
        }else{
            return NULL;
        }

}

function getUsuarioProfissional($idUsuario) {
        
         $connectionFactory = new connectionFactory();
        $connection = $connectionFactory->getConnection();
       
         $sqlProf = "select * from profissional where id_usuario = ".$idUsuario;
         echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         $res = mysql_query($sqlProf, $connection);	
         $arrayProfissional = array();
         
          if (mysql_num_rows($res) > 0) {
         while($row=mysql_fetch_assoc($res)){
             
             $arrayProfissional = $row;	
             
          }}
          else{
              $arrayProfissional = NULL;
          }
         
         if(sizeof($arrayProfissional) > 0){
             return $arrayProfissional;
         } else {
             return null;
             }
    }
    
    
 
function getUsuarioCliente($idUsuario) {
        
         $connectionFactory = new connectionFactory();
        $connection = $connectionFactory->getConnection();
       
         $sqlCliente = "select * from cliente where id_usuario = ".$idUsuario;
         
         $res = mysql_query($sqlCliente, $connection);	
         $arrayCliente = array();
        		
         while($row=mysql_fetch_assoc($res)){
             
             $arrayCliente = $row;	
             $arrayCliente['data_nascimento'] = join('/',array_reverse(explode('-',$arrayCliente['data_nascimento'])));
         }
         
         if(sizeof($arrayCliente) > 0){
             return $arrayCliente;
         } else {
             return null;
             }
    }
    
       
        
           
}