te<?php

require_once '../entity/Bairro.class.php';
require_once '../entity/Cidade.class.php';
require_once '../entity/Logradouro.class.php';
require_once '../entity/UF.class.php';
require_once '../connectionFactory/connectionFactory.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnderecoDAO
 *
 * @author Marcos Vasconcelos
 */
class EnderecoDAO {

    function getEnderecoCompletoPorCep($cep) {
        $connectionFactory = new connectionFactory();
        $connection = $connectionFactory->getConnection();
        
        mysql_query('SET CHARACTER SET utf8', $connection);
        
        $sqlGetEnddereco = "select log.*, bairro.*, cidade.*, uf.* from tb_logradouro log, tb_bairro bairro, tb_cidade cidade, tb_uf uf
        where log.TB_Bairro_PK_Bairro = bairro.PK_Bairro
        and bairro.TB_Cidade_PK_Cidade = cidade.PK_Cidade
        and cidade.TB_UF_Sigla_UF = uf.Sigla_UF
        and log.CEP_Logradouro = '" . $cep . "'" ;

        $result = mysql_query($sqlGetEnddereco, $connection);
        
        $row = mysql_fetch_assoc($result);
      
        if ($row != null && sizeof($row) > 0) {

            
                $uf = new UF($row["Sigla_UF"], $row["Nome_Estado"]);
                $cidade = new Cidade($uf, $row["PK_Cidade"], $row["Nome_Cidade"]);
                $bairro = new Bairro($row["PK_Bairro"], $row["Nome_Bairro"], $cidade);
                $logradouro = new Logradouro($row["PK_Logradouro"], $row["Nome_logradouro"], $row["CEP_Logradouro"], $bairro);
                
                
            
        } else {
            $logradouro = null;
        }

        mysql_close($connection);

        return $logradouro;
    }
    
     

}
