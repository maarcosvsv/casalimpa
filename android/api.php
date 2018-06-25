<?php
   require_once '../dao/Servico.dao.php';
    require_once '../entity/Servico.class.php';
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        /*hรก erros a consertar nessa pagina*/
        $paramum = $_POST['parametro1'];     
       $paramdois = $_POST['parametro2'];
        
	

        $servico = new Servico(null, $paramum, $paramdois, 1);
      
       $servicoDAO = new ServicoDAO();
       $servicoDAO->incluirServico($servico);
	   
	   echo("AQUI EU SOLTEI O JSON FALTA O ANDROID LER ESTE JSON!!");


?>