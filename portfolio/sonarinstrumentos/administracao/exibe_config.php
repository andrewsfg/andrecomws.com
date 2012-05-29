<?php include("valida_login.php");//VALIDA SE USUÁRIO ESTÁ LOGADO PARA PROSSEGUIR?>

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

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - CONFIGURAÇÕES</h1>

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

  <p>

      <?php

include("conecta.php");//CONECTAR AO BANCO

?>

  </p>

	 <?php include("menu.php");//MOSTRAR MENU?>

   <a href="edita_css.php"><h3><img src="../imgs/adm_painel_altera.gif" width="25" height="21" hspace="3" vspace="0" /><span class="titadm">EDITAR CSS</span></h3></a>

Edite o código CSS do Sonar Instrumentos

</div>



</div>



</div>







</body>

</html>

