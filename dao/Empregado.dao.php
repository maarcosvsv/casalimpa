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
 
         $sqlInsertUsuario = "INSERT INTO usuario(login,senha,email, idsituacao) "
                 . "values ('".$usuario->getLogin()."','".$usuario->getSenha()."',"
                 . "'".$usuario->getEmail()."','".$usuario->getSituacao()."') ";
           
        mysql_query($sqlInsertUsuario, $connection); 
           
        mysql_close($connection); 
         

}
}