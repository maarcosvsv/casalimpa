<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$usuario = $_SESSION['usuario'];
include '../resources/layoutInterno.php';


        ?>
<div id="form" style="height: 500px !important">
	<div id="form1">
<br>
<h4>Dados Cadastrais</h4>
<hr>
<?php

echo'<img src="../resources/img/logoVert.png" alt="Meu Perfil" title="Meu Perfil"  width="70" height="100"vspace="5px" hspace="5px" border="5px" align="left"/>';
//alterar imagem depois usando imagem do projeto
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";

echo"<h5>Nome</h5>";
echo '';//pegar nome do banco
echo"<br>";
echo"<h5>CPF/CNPJ</h5>";
echo '';//pegar cpf/cnpj do banco
echo"<br>";
echo"<h5>Email</h5>";
echo '';//pegar email do banco
echo"<br>";
echo"<h5>Login</h5>";
echo '';//pegar login do banco
echo"<br>";
echo"<h5>Endereço</h5>";
echo '';//pegar endereço do banco
echo"<br>";
?>
</div>
</form>
 