<?php 

//VERIFICA SE USUÁRIO JÁ FOI LOGADO E REDIRECIONA PARA PÁGINA LOGADO.PHP

session_start();

if(isset($_SESSION["perm"])){

	header("location:logado.php");

	}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><script language="JavaScript" type="text/javascript" src="js/funcoes.js"></script>

<script language="javascript" type="text/javascript">

<!--

//VALIDAÇÃO DOS FORMULÁRIOS

function Valida(){

         if(!CampoObrigatorio(document.formulario.usuario)){

				 alert('O campo nome está em branco e é obrigatório');

				 					document.formulario.usuario.focus();

				 return false;	 

				 }else if(!CampoObrigatorio(document.formulario.senha)){

				 alert('O campo senha deve ser preenchido');

				 					document.formulario.senha.focus();

				 return false;

				 }else{

				 return true;

				 }

			}

			

//-->

</script><?php

//CONECTAR AO BANCO

include("administracao/conecta.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="style.css" rel="stylesheet" />

<title>Sonar Instrumentos</title>

</head>



<body>



<div id="container">



    <div id="topo">

	<?php include("inc/topo.php");//TOPO?>

    </div>

    

    <div id="menu"><?php include("inc/menu.php");//MENU?></div>

    

    <div id="menu_vertical">

    <?php include("inc/menu_vertical.php");//MENU TODAS CATEGORIAS?>

    </div>

    <div id="conteudo"><img src="imgs/vn_meu_cad.gif" alt="Meu Cadastro" width="128" height="27" vspace="3" title="Meu Cadastro" /><br />

	  <?php

//EXIBIR ERROS AO USU&Aacute;RIO



if(!empty($_GET['erro'])){

$erro = $_GET['erro'];

switch (!empty($erro)){

	case $erro == 1:

		print "<strong>Erro: Preencha a senha corretamente</strong>";

		break;

	case $erro == 2:

		print " <strong>Erro: entre com o usu&aacute;rio correto</strong>";

		break;

	case $erro == 3:

		print "<strong> Erro: senha ou usu&aacute;rio incorretos</strong>";

		break;

	case $erro == 4:

		print "<strong> Entre com o usu&aacute;rio e senha</strong>";

		break;

		case $erro == 5:

		print "<strong> CADASTRO feito com sucesso. Entre com seu login e senha</strong>";

		break;

	}

}



?>

	  <br />

	  <form name="formulario" method="post" action="autentica.php" name="Contato" 

    onsubmit="javascript:return Valida(this)">

	<p>Entre com seu us&aacute;rio e senha </p>

	<p>Se n&atilde;o possui um cadastro, <a href="cadastrar.php"><strong>CLIQUE AQUI</strong></a>. </p>

	<p>Login: 

	  <input type="text" name="usuario" />

	  <br />

	Senha: 

	<input type="password" name="senha"  />

	<br />

	<input type="hidden" name="status" value="1" />

	<br />

		

	<input type="submit" name="bt_login" value="Enviar" />

    <input type="reset" name="bt_login" value="Limpar" />

    </p>

</form>

  </div>

    

  <div id="rodape">

    <?php include("inc/rodape.php");//RODAPÉ?>

	</div>



</div>

</body>

</html>

