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

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - LOGIN</h1>

</div>



<div id="contadm">Entre com seu login e senha de administrador

</div><div id="paineladm"><?php

//exibir erro



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



<form name="login" method="post" action="autentica.php">

	

	<br />

	Login: 

	<input type="text" name="usuario" /><br />

	Senha: <input type="password" name="senha" /><br />

	<input type="hidden" name="status" value="1" /><br />

		

	<input type="submit" name="bt_login" value="Enviar" />

    <input type="reset" name="bt_login" value="Limpar" />

</form>

<p>

<a href="../index.php"><strong>Voltar ao site</strong></a></div></p>



</div>



</div>







</body>

</html>

