<html>
<head>
    
<meta charset="utf-8">

</head>

<body>

<div id="#">
<p> Cadastro de Serviços:</P>
<form action="../action/cadastroServico.action.php" method="POST">
	<p>Tipos de Serviços</p>
		<select id="nome" name="nome">
			<option value="baba">Babá</option>
			<option value="diarista">Diarista</option>
			<option value="cuidador_de_idosos">Cuidador(a) de Idosos</option>
			<option value="cozinheiro">Cozinheiro(a)</option>
			<option value="passadeira">Passador(a)</option>
			<option value="lavadeira">Lavador(a)</option>
			<option value="piscineiro">Piscineiro(a)</option>
                        <option value="jardineiro">Jardineiro(a)</option>
                        <option value="arrumador">Arrumador(a)</option> <!--Pessoal que apenas organiza guarda roupas armarios bibliotecas -->
		</select>
	
	<p>Descrição do Serviço<p/>
	
        <input type="text" id="descricao" name="descricao" placeholder="Descrição do Serviço"/><br/>
        
        <p>Nivel de Dificuldade<p/>
        <select id="dificuldade_servico" name="sevico">
			<option value="baba"> 0 - Entre: X hrs a X hrs</option>
			<option value="diarista"> 1 - Entre: X hrs a X hrs</option>
			<option value="cuidador_de_idosos"> 2 - Entre: X hrs a X hrs</option>
			<option value="cozinheiro"> 3 - Entre: X hrs a X hrs</option>
			<option value="passadeira"> 4 - Entre: X hrs a X hrs</option>
			<option value="lavadeira"> 5 - Entre: X hrs a X hrs</option>
		</select>
        <br>
        <br>

	<input type="submit" class="" value="enviar"/>
	
	</form>
	
	


</div>
</body>
</html>