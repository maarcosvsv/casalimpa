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
			<option value="Babá">Babá</option>
			<option value="Diarista">Diarista</option>
			<option value="Cuidador(a) de Idosos">Cuidador(a) de Idosos</option>
			<option value="Cozinheiro(a)">Cozinheiro(a)</option>
			<option value="Passador(a)">Passador(a)</option>
			<option value="Lavador(a)">Lavador(a)</option>
			<option value="Piscineiro(a)">Piscineiro(a)</option>
                        <option value="Jardineiro(a)">Jardineiro(a)</option>
                        <option value="Arrumador(a)">Arrumador(a)</option> <!--Pessoal que apenas organiza guarda roupas armarios bibliotecas -->
		</select>
	
	<p>Descrição do Serviço<p/>
	
        <input type="text" id="descricao" name="descricao" placeholder="Descrição do Serviço"/><br/>
        
        <p>Nivel de Dificuldade<p/>
        <select id="dificuldade_servico" name="dificuldade_servico">
			<option value="0"> 0 - Entre: X hrs a X hrs</option>
			<option value="1"> 1 - Entre: X hrs a X hrs</option>
			<option value="2"> 2 - Entre: X hrs a X hrs</option>
			<option value="3"> 3 - Entre: X hrs a X hrs</option>
			<option value="4"> 4 - Entre: X hrs a X hrs</option>
			<option value="5"> 5 - Entre: X hrs a X hrs</option>
		</select>
        <br>
        <br>

	<input type="submit" class="" value="enviar"/>
	
	</form>
	
	


</div>
</body>
</html>