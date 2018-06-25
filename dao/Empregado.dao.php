<?php
    require_once '../entity/Empregado.class.php';
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
class EmpregadoDAO {
   
    function incluirEmpregado($empregado) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
         
         $usuario = $empregado->getUsuario();
         
       
         
         $sqlInsertUsuario = "INSERT INTO usuario(login,senha,email, idsituacao, expiracao, cpf_cnpj, complemento, tb_logradouro_PK_logradouro) "
                 . "values ('".$usuario->getLogin()."','".$usuario->getSenha()."',"
                 . "'".$usuario->getEmail()."',".$usuario->getSituacao().","
                 . "'".$usuario->getExpiracao()."','".$usuario->getDocIdentificacao()."','".$usuario->getComplementoEndereco()."',".$usuario->getLogradouro()->getIdLogradouro().")";
           
         
           $idLogradouro = $usuario->getLogradouro()->getIdLogradouro();
         
         if($idLogradouro == NULL || $idLogradouro == ""){
                  $sqlInsertUsuario = "INSERT INTO usuario(login,senha,email, idsituacao, expiracao, cpf_cnpj, complemento) "
                 . "values ('".$usuario->getLogin()."','".$usuario->getSenha()."',"
                 . "'".$usuario->getEmail()."',".$usuario->getSituacao().","
                 . "'".$usuario->getExpiracao()."','".$usuario->getDocIdentificacao()."','".$usuario->getComplementoEndereco()."')";
           
         }

         mysql_query($sqlInsertUsuario, $connection); 
               
      //echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         $idUsuario = mysql_insert_id();
       
         $errorUsuario = mysql_errno($connection);
         
           $sqlInsertEmpregado = "INSERT INTO profissional(nome,telefone, id_usuario) "
                 . "values ('".$empregado->getNome()."','".$empregado->getTelefone()."',"
                 . "".$idUsuario.") ";
           
        mysql_query($sqlInsertEmpregado, $connection); 
        
        $idProfissional = mysql_insert_id();
        
         $sqlInsertEmpregado = "INSERT INTO qualificacao_profissional(id_profissional, total_reclamacoes, total_satisfeitos, media_atendimento) "
                 . "values (".$idProfissional.",0,0,0) ";
           
        mysql_query($sqlInsertEmpregado, $connection); 
        
        //echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         
        
        $errorProfissional = mysql_errno($connection);
        mysql_close($connection);

        if($errorProfissional == "0" && $errorUsuario == "0"){
            return true;
        }else{
            return false;
        }

}
 function incluirEmpregador($usuario, $nome, $telefoneCompleto, $dataNascimento) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
         
       
         
         $sqlInsertUsuario = "INSERT INTO usuario(login,senha,email, idsituacao, expiracao, cpf_cnpj, complemento, tb_logradouro_PK_logradouro) "
                 . "values ('".$usuario->getLogin()."','".$usuario->getSenha()."',"
                 . "'".$usuario->getEmail()."',".$usuario->getSituacao().","
                 . "'".$usuario->getExpiracao()."','".$usuario->getDocIdentificacao()."','".$usuario->getComplementoEndereco()."',".$usuario->getLogradouro()->getIdLogradouro().")";
           
         
           $idLogradouro = $usuario->getLogradouro()->getIdLogradouro();
         
         if($idLogradouro == NULL || $idLogradouro == ""){
                  $sqlInsertUsuario = "INSERT INTO usuario(login,senha,email, idsituacao, expiracao, cpf_cnpj, complemento) "
                 . "values ('".$usuario->getLogin()."','".$usuario->getSenha()."',"
                 . "'".$usuario->getEmail()."',".$usuario->getSituacao().","
                 . "'".$usuario->getExpiracao()."','".$usuario->getDocIdentificacao()."','".$usuario->getComplementoEndereco()."')";
           
         }

         mysql_query($sqlInsertUsuario, $connection); 
               
      //echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         $idUsuario = mysql_insert_id();
       
         $errorUsuario = mysql_errno($connection);
         
          $sqlInsertEmpregado = "insert into cliente (nome, telefone, data_nascimento,  id_usuario) "
                 . "values ('".$nome."','".$telefoneCompleto."','".$dataNascimento."',".$idUsuario.")";  
           
        mysql_query($sqlInsertEmpregado, $connection); 
        // echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         
        
        $errorCliente = mysql_errno($connection);
        mysql_close($connection);

        if($errorCliente == "0" && $errorUsuario == "0"){
            return true;
        }else{
            return false;
        }

}
}