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

	include("conecta.php");

	$pedidoid = $_GET['pedidoid'];



	$s_exibe = "SELECT produto_id,pedido_item_qtde,pedido_item_valor FROM pedido_item WHERE pedido_id = $pedidoid";

	$q_exibe = mysql_query ($s_exibe);



?>

<table width="600" border="0" align="center" cellpadding="2" cellspacing="2">

  <tr>

    <td colspan="5">&nbsp;</td>

  </tr>

  <tr>

    <td colspan="5">Pedido N&ordm; <?php echo $pedidoid; ?></td>

  </tr>

  <tr>

    <td width="160"><div align="center"><strong>Produto</strong></div></td>

    <td width="80"><div align="center"><strong>Qtidade</strong></div></td>

    <td width="80"><div align="center"><strong>Presente</strong></div></td>

    <td width="80"><div align="center"><strong>Pre&ccedil;o</strong></div></td>

    <td width="80"><div align="center"><strong>Total</strong></div></td>

  </tr>

  <?php 

  

  	$total_pedido = 0;

 

	while ($r_exibe = mysql_fetch_array($q_exibe)){	

	

		$produto_id = $r_exibe[0];

	

		$s_produto = "SELECT nome FROM produtos WHERE id_produto = $produto_id";

		$q_produto = mysql_query ($s_produto);

		$r_produto = mysql_fetch_array($q_produto);

		

		$preco_total = $r_exibe[2];

		$preco = $r_exibe[2]/$r_exibe[1];

		

		

		print 

			"<tr>

	    		<td>".$r_produto['nome']."</td>

			    <td>".$r_exibe[1]."</td>

			    <td>";

				



		print 

				"</td>

			    <td>".number_format($preco, 2, ",", ".")."</td>

			    <td>".number_format($preco_total, 2, ",", ".")."</td>

	    	</tr>";

			

			}

	   $total_pedido += $preco_total;

?>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td colspan="2"><div align="right">Total do Pedido -&gt; </div></td>

    <td><strong>R$ <?php echo number_format($total_pedido, 2, ",", "."); ?></strong></td>

  </tr>

</table>

  <p>&nbsp;</p>

  <p><a href="javascript:history.back();">Voltar</a><br />

    </p>

    </p>

</div>



</div>



</div>







</body>

</html>

