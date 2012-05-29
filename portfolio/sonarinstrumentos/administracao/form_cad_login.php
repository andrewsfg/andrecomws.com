<?php include("valida_login.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" />

<title>..: Sonar Instrumentos - Administra&ccedil;&atilde;o</title>

</head>

<body>



<div id="container">



<div id="topoadm"><a href="index.php"><img src="../imgs/topo.jpg" alt="Painel de Administra&ccedil;&atilde;o" border="0" title="Painel de Administração" /></a></div>





<div id="meioadm">

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - USU&Aacute;RIOS</h1>

</div>



<div id="contadm"><?php

//VALIDANDO O USUÁRIO

	print "bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar.php">Deslogar</a>';

	

	//SE NÃO FOR ADMINISTRADOR, REDIRECIONAR

	if($_SESSION["perm"] <> 0){

	header("location:../index.php");

	}

?>

</div><div id="paineladm">

  <p><span class="titadm2"><a href="exibe_usuarios.php"><?php include("menu.php");?></span></p>

  <p>

      <?php

//exibir erro



if(!empty($_GET['erro'])){

$erro = $_GET['erro'];

switch (!empty($erro)){

	case $erro == 1:

		print "usuário inválido";

		break;

	case $erro == 2:

		print "senha não confere";

		break;

	case $erro == 3:

		print "status incorreto";

		break;

	case $erro == 4:

		print "permissão incorreta";

		break;

		}

}

?>

  <p class="titadm"><img src="../imgs/adm_painel_adicionar.gif" width="20" height="20" hspace="4" />Inserir Novo Usu&aacute;rio:<br />

  </p>

  <form name="cad_login" method="post" action="sql_grava_login.php">

	Nome de usuário: 

	<input type="text" name="usuario" />

	<br />

	Senha: <input type="password" name="senha" /><br />

	Confirma senha: <input type="password" name="conf_senha" /><br />

	Permissão:<select name="perm">

	<option value="0">Administrador</option>

	<option value="1">Usuário</option>

	<option value="2">Fornecedor</option><br />

	</select><br />

	<strong><br />

	Status:</strong><br />

	Ativo: <input name="status" type="radio" value="0" checked="checked" />

     Inativo:<input name="status" type="radio" value="1" />

   <br />

   <input type="submit" name="bt_cadlogin" value="gravar" />

   <input type="reset" name="bt_cadlogin" value="limpar" />	

</form>

    

	

  <br />

  <br />

  <a href="javascript:history.back();"><strong>Voltar</strong></a>

  </p>

</div>



</div>



</div>







</body>

</html>

