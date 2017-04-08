<?php

require_once '../../dao/Endereco.dao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$cep = $_POST['cep'];
 
$enderecoDAO = new EnderecoDAO(); 
$logradouro = $enderecoDAO.getEnderecoCompletoPorCep($cep);
 
$dados['sucesso'] = (string) 1;
$dados['logradouro'] = (string) $logradouro->nomeLogradouro;
$dados['bairro']  = (string) $logradouro->bairro->nomeBairro;
$dados['cidade']  = (string) $logradouro->bairro->cidade->nomeCidade;

 
echo json_encode($dados);
 


