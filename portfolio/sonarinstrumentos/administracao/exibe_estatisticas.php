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

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - CATEGORIAS</h1>

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

  <?php include("menu.php");?>

    <?php 

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>CATEGORIA cadastrada com sucesso.</strong></p>';

			  }elseif($frase==2){

					print '<p>Aviso: <strong>CATEGORIA deletada com sucesso.</strong></p>';			  

					}

					}

			 ?>

  

  <p class="titadm"><img src="../imgs/adm_painel_logsacesso.gif" width="16" height="16" hspace="2" /><a href="exibe_logusuario.php">Log's de acesso</a></p>Relat&oacute;rios de acesso de usu&aacute;rios e administradores no site

</div>



</div>



</div>







</body>

</html>

