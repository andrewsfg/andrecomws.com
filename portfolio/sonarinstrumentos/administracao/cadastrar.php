<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><?php

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

	<?php include("inc/topo.php");?>

    </div>

    

    <div id="menu"><?php include("inc/menu.php");?></div>

    

    <div id="menu_vertical">

    <?php include("inc/menu_vertical.php");?>

    </div>

    <div id="conteudo">

    <?php

//EXIBIR ERROS PRA O USUÁRIO

if(!empty($_GET['erro'])){

$erro = $_GET['erro'];

switch (!empty($erro)){

	case $erro == 1:

		print "<strong>Erro: Preencha a senha corretamente</strong>";

		break;

	case $erro == 2:

		print " <strong>Erro: entre com o usuário correto</strong>";

		break;

	case $erro == 3:

		print "<strong> Erro: senha ou usuário incorretos</strong>";

		break;

	case $erro == 4:

		print "<strong> Entre com o usuário e senha</strong>";

		break;

	}

}



?>

 <form name="cad_login" method="post" action="sql_grava_login.php">

	<h4><strong>Cadastre-se</strong></h4>

	<p>Seu Nome:

      <input name="nome" type="text" id="nome" />

      <br />

      E-mail:

      <input name="emaill" type="text" id="emaill" />

<br />

	  Nome de usuário:

      <input type="text" name="usuario" />

	  <br />

	Senha: 

	<input type="password" name="senha" />

	<br />

	Confirma senha: 

	<input type="password" name="conf_senha" />

	<br />

	Endere&ccedil;o:

    <input name="endereco" type="text" id="endereco" maxlength="100" />

    N.&deg;

    <input name="num" type="text" id="num" size="5" maxlength="5" />

<br />

    CEP:

    <input name="cep" type="text" id="cep" maxlength="100" />

<br />

    Cidade:

    <input name="cidade" type="text" id="cidade" maxlength="100" />

    Estado:

    <input name="estado" type="text" id="estado" size="5" maxlength="5" />

<br />

    Telefone:

    <input name="ddd" type="text" id="ddd" size="3" maxlength="3" />

    <input name="fone" type="text" id="fone" size="10" maxlength="9" />

    <br />

	<br />

	<br />

     <input type="submit" name="bt_cadlogin" value="cadastrar" />

     <input type="reset" name="bt_cadlogin" value="limpar" />	

      </p>

 </form>

    </div>

    

    <div id="rodape">

    <?php include("inc/rodape.php");?>

	</div>



</div>

</body>

</html>

