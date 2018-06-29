<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';
include_once '../dao/Usuario.dao.php';
include '../dao/Endereco.dao.php';

$idUsuario = $_POST['idUsuario'];
$idOption = $_POST['idOption'];
$usuarioDAO = new UsuarioDAO();
$verificacaoUsuarioCliente = $usuarioDAO->getUsuarioCliente($idUsuario);
$servicoDAO = new ServicoDAO();
$enderecoDAO = new EnderecoDAO();


if($idOption == "GET_CIDADES"){
$cidades = $enderecoDAO->getCidades();

if($cidades != null){
	$result['result'] = "true";
	$result['cidades'] = json_encode($cidades); 
	
	} else {
	$result['result'] = "false";
	}
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if($idOption == "GET_BAIRROS_POR_CIDADE"){
	$idCidade = $_POST['idCidade'];  
	$bairros = $enderecoDAO->getBairrosPorCidade($idCidade);

	
	if($bairros != null){
	$result['result'] = "true";
	$result['bairros'] = json_encode($bairros); 
	
	} else {
	$result['result'] = "false";
	}
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
}


if($idOption == "GET_CATEGORIAS"){
	$categoriasServico = $servicoDAO->getCategoriasServico();
	
	if($categoriasServico != null){
	$result['result'] = "true";
	$result['categoriasServico'] = json_encode($categoriasServico); 
	
	} else {
	$result['result'] = "false";
	}
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if($idOption == "GET_SERVICO_POR_ID"){
	if(isset($_POST['codServico'])){
$codServico = $_POST['codServico'];}
else{
    $idBairro = null;
}

$servicoDAO = new ServicoDAO();
$servico = $servicoDAO->getServicoPorCodigo($codServico);
	
	for($i = 0; $i < sizeof($servico); $i++){
		$imagemServico = $servico[$i]['imagemPrincipal'];
		//$servico[$i]['imagemPrincipal'] = chunk_split(base64_encode($imagemServico));
		$servico[$i]['imagemPrincipal'] = "";
	}
	
	if($servico[0] != null){
	$result['result'] = "true";
	$result['servico'] = json_encode($servico[0]); 
	
	} else {
	$result['result'] = "false";
	}
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}


if($idOption == "GET_SERVICOS"){

if(isset($_POST['idCidade'])){
  $idCidade = $_POST['idCidade'];  
}else {
    $idCidade = null;
}

if(isset($_POST['idBairro'])){
$idBairro = $_POST['idBairro'];}
else{
    $idBairro = null;
}

if(isset($_POST['idCategoriaServico'])){
$idCategoriaServico = $_POST['idCategoriaServico'];}
else{
    $idCategoriaServico = null;
}
$startrow = NULL;

$servicoDAO = new ServicoDAO();
$servicos = $servicoDAO->getServicosPorFiltro($idCidade, $idBairro, $idCategoriaServico,$startrow);

for($i = 0; $i < sizeof($servicos); $i++){
		$imagemServico = $servicos[$i]['imagemPrincipal'];
		$servicos[$i]['imagemPrincipal'] = chunk_split(base64_encode($imagemServico));
	}
	
	if($servicos != null){
	$result['result'] = "true";
	$result['servicos'] = json_encode($servicos); 
	
	} else {
	$result['result'] = "false";
	}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
} 




?>