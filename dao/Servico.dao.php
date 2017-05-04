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
         
         $sqlInsertServico = "INSERT INTO categoria_servico(nome,descricao,nivel_dificuldade)"
                 . "values ('".$servico->getnome()."',"
                         . "'".$servico->getdescricao()."',"
                         . "'".$servico->getdificuldadeservico()."')";

         mysql_query($sqlInsertServico, $connection);

         echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
         
          

}
}