<?php 

//VERIFICA SE USUÁRIO JÁ FOI LOGADO E REDIRECIONA PARA PÁGINA LOGADO.PHP

session_start();

if(isset($_SESSION["status"]) and $_SESSION["status"] == 1){

$usuario = $_SESSION["usuario"];

	$logado = 1;

	}else{

	$logado = 0;

	}



?>

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

	<?php include("inc/topo.php");//TOPO?>

    </div>

    

    <div id="menu"><?php include("inc/menu.php");//MENU?></div>

    

    <div id="menu_vertical">

    <?php include("inc/menu_vertical.php");//MENU - TODAS CATEGORIAS?>

    </div>

    

    <div id="conteudo"><img src="imgs/vn_busca2.gif" width="191" height="33" hspace="0" vspace="2" /><br /><br /><?php include("inc/produtos_busca.php");//PRODUTOS QUE SÃO DESTAQUES PRINCIPAIS?></div><div id="rodape"><?php include("inc/rodape.php");//RODAPÉ?>

</div>



</div>

</body>

</html>

