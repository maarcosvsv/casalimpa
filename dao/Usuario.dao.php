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
                  null, 
                  null);
            
         }

     
        $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return $usuario;
        }else{
            return NULL;
        }

}
}