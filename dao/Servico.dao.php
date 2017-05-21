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

  function getServicoPorUsuario($idUsuario) {
         $connectionFactory = new connectionFactory();
         $connection = $connectionFactory->getConnection();
        $sqlServico= "select serv.cod_servico as codigoServico, serv.prazo as prazoServico, serv.preco_sugerido as precoServico, catServ.descricao, p.nome, p.registro_salarial
             from servico serv, profissional p, categoria_servico catServ where catServ.cod_categoria_servico = serv.categoria_servico_cod_categoria_servico
 and p.id_profissional = serv.id_profissional
 and p.id_usuario = ".$idUsuario."  
 and serv.ativo = 1";
   $result = mysql_query($sqlServico,  $connection);
    echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
      
        
     $servicos[] = null;
        $count = 0;
   while ($row = mysql_fetch_assoc($result)) {
        $servicos[$count] = $row;
            $count++;
         }
  $error = mysql_errno($connection);
        mysql_close($connection);
        if($error == "0"){
            return $servicos;
        }else{ return NULL;
        }
        
}

}