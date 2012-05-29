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

					 }elseif($frase==3){

					print '<p>Aviso: <strong>CATEGORIA alterada com sucesso.</strong></p>';			  

					}

					}

			 ?>

  

  <p class="titadm"><a href="form_cad_categoria.php"><img src="../imgs/adm_painel_adicionar.gif" width="20" height="20" hspace="4" /></a><a href="form_cad_categoria.php">Inserir categoria</a></p>

  <p>

      <?php



//EXIBIR CATEGORIAS



include("conecta.php");



$sel_categoria = "SELECT ordem,nome,id_categoria FROM categoria

				ORDER BY ordem ASC";

$q_categoria = mysql_query($sel_categoria);

$r_itemcategoria = mysql_num_rows($q_categoria);

if($r_itemcategoria >0){

while($r_categoria = mysql_fetch_array($q_categoria)){

	print '<div id="admcat">';

	$ordem = $r_categoria[0];

	print '<a href="exibe_subcategoria.php?idcategoria='.$r_categoria[2].'"><img src="../imgs/adm_painel_pasta.gif" hspace="4" title="Abrir" alt="Abrir" /></a> ';

	print $ordem." - ";

	print '<a href="exibe_subcategoria.php?idcategoria='.$r_categoria[2].'">'.$r_categoria[1]."</a>";

	print " - <a href='form_upd_categoria.php?idcategoria=".$r_categoria[2]."'><strong>Alterar</strong></a></div>";

}

	}else{

	

	}	

		?>

    

</p>

</div>



</div>



</div>







</body>

</html>

