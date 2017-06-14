
<?php
header("Content-type: application/json; charset=utf-8");
require_once '../ajax/Endereco.dao.php';

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





