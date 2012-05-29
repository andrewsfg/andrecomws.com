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

<title>.:: Sonar Instrumentos [Projeto Semestral Web Design - Grupo A]</title>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

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

    

    <div id="banner">

      <script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','650','height','110','src','imgs/banner','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','imgs/banner' ); //end AC code

      </script>

      <noscript>

      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="650" height="110">

        <param name="movie" value="imgs/banner.swf" />

        <param name="quality" value="high" />

        <embed src="imgs/banner.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="650" height="110"></embed>

      </object>

      </noscript>

    </div>

    <div id="conteudo"><?php

	//EXIBIR BOAS VINDAS E CHECAR SE ELE ESTÁ LOGADO

	if($logado == 1){

	print "Seja bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar_home.php">Deslogar</a><br />';

	}else{

	print 'Bem vindo <strong>visitante</strong> - <a href="logar.php">Logar-se</a> - <a href="cadastrar.php">Cadastrar-se</a><br />';

	}

	print '<h3>OFERTAS DA SEMANA</h3>';

    include("inc/produtos_home.php");//PRODUTOS QUE SÃO DESTAQUES PRINCIPAIS?>

    </div>

    

    <div id="rodape">

    <?php include("inc/rodape.php");//RODAPÉ


?>

	</div>



</div>

</body>

</html>

