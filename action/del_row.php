<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../connectionFactory/connectionFactory.php';

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

if(isset($_GET['id'])){
    
$query = "UPDATE servico SET ativo = 0 WHERE cod_servico = ".$_GET['id'].";";
$result = mysql_query($query, $connection);
//header("location: ../action/listaServicos.php");

}