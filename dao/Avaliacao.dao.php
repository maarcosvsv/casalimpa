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
class AvaliacaoDAO {

    function incluirServico($servico) {
        $connectionFactory = new connectionFactory();
        $connection = $connectionFactory->getConnection();

        $sqlInsertServico = "INSERT INTO categoria_servico(nome,descricao,nivel_dificuldade)"
                . "values ('" . $servico->getnome() . "',"
                . "'" . $servico->getdescricao() . "',"
                . "'" . $servico->getdificuldadeservico() . "')";

        mysql_query($sqlInsertServico, $connection);

        echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
    }

    function getAvaliacaoCliente($idUsuario) {
        $connectionFactory = new connectionFactory();
        $connection = $connectionFactory->getConnection();
        $sqlAvaliacao = "select sum(qqc.media_satisfatoria) as totalSatisfacao, count(qqc.cod_qualificacao) as totalQualificacoes,
CONVERT( (sum(qqc.media_satisfatoria)/count(qqc.cod_qualificacao)), DECIMAL(4,2))  as notaQualificacao
from qualificacao_cliente qqc inner join cliente cli on cli.id_cliente = qqc.cliente_usuario_cod_usuario
and cli.id_usuario = " . $idUsuario;



        $result = mysql_query($sqlAvaliacao, $connection);



        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $avaliacao = null;

                $avaliacao = $row;
            }
        } else {
            $avaliacao = NULL;
        }
        $error = mysql_errno($connection);
        mysql_close($connection);
        if ($error == "0") {
            return $avaliacao;
        } else {
            return NULL;
        }
    }

    function getAvaliacaoProfissional($idUsuario) {
        $connectionFactory = new connectionFactory();
        $connection = $connectionFactory->getConnection();
        $sqlAvaliacao = "select qqp.* from qualificacao_profissional qqp 
            inner join profissional p on p.id_profissional = qqp.id_profissional
and p.id_usuario = " . $idUsuario;
        $result = mysql_query($sqlAvaliacao, $connection);



        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $avaliacao = $row;
            }
        } else {
            $avaliacao = NULL;
        }
        $error = mysql_errno($connection);
        mysql_close($connection);
        if ($error == "0") {
            return $avaliacao;
        } else {
            return NULL;
        }
    }

}
