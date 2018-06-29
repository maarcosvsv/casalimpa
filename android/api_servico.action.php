<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';
include_once '../dao/Usuario.dao.php';

$idUsuario = $_POST['idUsuario'];
$option = $_POST['idOption'];


$servicoDAO = new ServicoDAO();
$usuarioDAO = new UsuarioDAO();
$verificacaoUsuarioProfissional = $usuarioDAO->getUsuarioProfissional($idUsuario);


if($verificacaoUsuarioProfissional['id_profissional'] > 0 && $option == 'CATEGORIA_SERVICO'){
	$categoriasServico = $servicoDAO->getCategoriasServico();
	
	if($categoriasServico != null){
	$result['result'] = "true";
	$result['categoriasServico'] = json_encode($categoriasServico); 
	
	} else {
	$result['result'] = "false";
	}
	
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
}else if($verificacaoUsuarioProfissional['id_profissional'] > 0 && $option == 'GET_SERVICOS_USUARIO'){
	$servicos = $servicoDAO->getServicoPorUsuario($idUsuario);

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
	
} else if($option == 'GET_SERVICOS_USUARIO_REALIZADOS'){
	$servicos = $servicoDAO->getServicosPrestadosPorUsuario($idUsuario, NULL);

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
	
} else if($verificacaoUsuarioProfissional['id_profissional'] > 0 && $option == 'SALVAR_SERVICO'){
	
	if(isset($_POST['imagemServico'])){
		 $imagemServico = $_POST['imagemServico'];
		 date_default_timezone_set('America/Sao_Paulo');
			$date = date('Y_m_d_H_i');
		 $nomeArquivoTemp = 'TEMP_'.$idUsuario.$date.'JPEG';
		 $imsrc = base64_decode($_POST['imagemServico']);
		 $imagemServico = fopen($nomeArquivoTemp, 'w');
         fwrite($imagemServico, $imsrc);
         if(fclose($imagemServico)){
  
		$tamanho = filesize($nomeArquivoTemp);
		$fp = fopen($nomeArquivoTemp, "rb");
		$conteudo = fread($fp, $tamanho);
		$conteudo = addslashes($conteudo);
		fclose($fp);
		unlink($nomeArquivoTemp);
		}else{
		//echo "Error uploading image";
		}
    

	}else{
		$imagemServico = NULL;
	}
	


    $idCategoriaServico = $_POST['idCategoriaServico'];
    $prazoServico = $_POST['prazoServico'];
    $preco = $_POST['preco'];
    $observacoes = $_POST['observacoes'];
        
    $servicoDAO = new ServicoDAO();
   
    $resultado = $servicoDAO->vincularServicoUsuarioComBase($idCategoriaServico, $prazoServico, $preco, $observacoes, $idUsuario, $conteudo) ;  
        if( $resultado  == true ){
     $result['result'] = "true";
        }else{
        $result['result'] = "false";
          
        }
       echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
	
} else{
	$result['result'] = "false";
	$result['erro'] = "Usuário não possui permissão, ative o perfil prestador de serviços.";
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
}


	   
	   
 ?>
