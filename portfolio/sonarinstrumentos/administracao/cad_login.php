<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

</head>



<body>

<?php

//exibir erro



if(!empty($_GET['erro'])){

$erro = $_GET['erro'];

switch (!empty($erro)){

	case $erro == 1:

		print "usu�rio inv�lido";

		break;

	case $erro == 2:

		print "senha n�o confere";

		break;

	case $erro == 3:

		print "status incorreto";

		break;

	case $erro == 4:

		print "permiss�o incorreta";

		break;

		}

}

?>



<form name="cad_login" method="post" action="grava_login.php">

	Nome de usu�rio: <input type="text" name="usuario" /><br />

	Senha: <input type="password" name="senha" /><br />

	Confirma senha: <input type="password" name="conf_senha" /><br />

	Permiss�o:<select name="perm">

	<option value="0">Administrador</option>

	<option value="1">Usu�rio</option>

	<option value="2">Fornecedor</option><br />

	</select><br />

	Status:<br />

	Ativo: <input name="status" type="radio" value="0" />

     Inativo:<input name="status" type="radio" value="1" />

   <br />

   <input type="submit" name="bt_cadlogin" value="enviar" />

	

	

</form>



</body>

</html>

