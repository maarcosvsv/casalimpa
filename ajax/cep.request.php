
<?php
header("Content-type: application/json; charset=utf-8");
require_once 'Endereco.dao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$cep = $_POST['cep'];
 
$enderecoDAO = new EnderecoDAO(); 

$logradouro = $enderecoDAO->getEnderecoCompletoPorCep($cep);

if($logradouro != null){
$dados['sucesso'] = "1";
$dados['logradouro'] = (string) $logradouro->nomeLogradouro;
$dados['idLogradouro'] = (string) $logradouro->idLogradouro;
$dados['bairro']  = (string) $logradouro->bairro->nomeBairro;
$dados['cidade']  = (string) $logradouro->bairro->cidade->nomeCidade;
$dados['uf']  = (string) $logradouro->bairro->cidade->uf->nomeEstado;
}else{
    $dados['sucesso'] = "0";
}




echo json_encode($dados, JSON_UNESCAPED_UNICODE );





