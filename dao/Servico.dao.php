<?php
    require_once '../entity/Servico.class.php';
    require_once '../connectionFactory/connectionFactory.php';
    
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro de Serviço
 *
 * @author Daniel Marques
 */
class ServicoDAO {
   
    function incluirServico($servico) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
         
         $sqlInsertServico = "INSERT INTO categoria_servico(null,nome,descricao,dificuldade_servico"
                 . "values ('".$servico->getcod_categoria_servico()."','".$servico->getnome()."','".$servico->getdescricao()."','".$servico->getdificuldadeservico()."')";
     

         
         mysql_query($sqlInsertServico, $connection); 
               
      
         $cod_categoria_servico = mysql_insert_id();
echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}
}