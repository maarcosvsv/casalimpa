
<?php
header("Content-type: application/json; charset=utf-8");
require_once '../ajax/Endereco.dao.php';

$cep = $_POST['cep'];


$enderecoDAO = new EnderecoDAO(); 

$logradouro = $enderecoDAO->getEnderecoCompletoPorCep($cep);

if($logradouro != null){
$dados['result'] = "true";
$dados['logradouro'] = (string) $logradouro->nomeLogradouro;
$dados['idLogradouro'] = (string) $logradouro->idLogradouro;
$dados['bairro']  = (string) $logradouro->bairro->nomeBairro;
$dados['cidade']  = (string) $logradouro->bairro->cidade->nomeCidade;
$dados['uf']  = (string) $logradouro->bairro->cidade->uf->nomeEstado;
$dados['cep'] = $cep;
}else{
    $dados['result'] = "false";
}

echo json_encode($dados, JSON_UNESCAPED_UNICODE );





