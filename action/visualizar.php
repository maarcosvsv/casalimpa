<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../connectionFactory/connectionFactory.php';

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

mysql_select_db("casalimpa");

$query = "SELECT nome, descricao FROM categoria_servico";
$result = mysql_query($query, $connection);

$row = mysql_fetch_array($result);
echo $row[0]." - ";
echo $row[1];


