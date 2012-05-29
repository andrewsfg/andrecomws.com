<?php include("valida_login.php");//VALIDAR USUÁRIO?>

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

    <?php include("menu.php");?></span>

    <?php //RECEBE MENSAGEM

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>usuário cadastrado com sucesso.</strong></p>';

			  }elseif($frase==2){

					print '<p>Aviso: <strong>usuário deletado com sucesso.</strong></p>';			  				}elseif($frase==3){

					print '<p>Aviso: <strong>ERRO: nenhum usuário foi deletado. [Necessário ID]</strong></p>';

					}

					}

			 ?>

  

  <p class="titadm"><img src="../imgs/adm_painel_pedidos.gif" width="25" height="25" hspace="4" />Hist&oacute;rico de Pedidos</p>

  <p>

      <?php 

	  //EXIBIR PEDIDOS



	function data_formatada($dt){

	

		list($a, $m, $d) = explode ("-", $dt);

		

		$dn = $d."/".$m."/".$a;

		

		return $dn;

	

	}



	include ("conecta.php");

	//QUERY PARA SELECIONAR PEDIDO

	$s_exibe = "SELECT pedido_id, pedido_data, pedido_valor,usuario FROM pedido";

	$q_exibe = mysql_query ($s_exibe);

while ($r_exibe = mysql_fetch_array($q_exibe)){

$nome_usuario = $r_exibe['usuario'];

?>

<table width="400" border="0" align="center">

  <tr>

    <td colspan="3"><strong>Cliente:</strong> <?php print $nome_usuario; ?></td>

  </tr>

  <tr>

    <td><strong>Pedido</strong></td>

    <td><strong>Data</strong></td>

    <td><strong>Valor Total</strong> </td>

  </tr>

  <?php 

	

		$data = data_formatada($r_exibe[1]);

	

  		print 

			  "<tr>

				<td><a href=\"mostra_pedido.php?pedidoid=".$r_exibe[0]."\">".$r_exibe[0]."</a></td>

				<td>".$data."</td>

				<td>".number_format($r_exibe[2], 2, ",", ".")."</td>

			  </tr>";

			  

	}

  

  ?>

</table>

    

</p>

</div>



</div>



</div>







</body>

</html>

