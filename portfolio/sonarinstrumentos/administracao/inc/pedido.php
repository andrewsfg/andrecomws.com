<?php 



	function data_formatada($dt){

	

		list($a, $m, $d) = explode ("-", $dt);

		

		$dn = $d."/".$m."/".$a;

		

		return $dn;

	

	}



	include ("../../inc/administracao/conecta.php");



	if (!isset ($_SESSION['usuario'])){

	

		header("location:logar.php");

	

	}

    $usuario = $_SESSION['usuario'];



	$s_exibe = "SELECT pedido_id, pedido_data, pedido_valor FROM pedido";

	$q_exibe = mysql_query ($s_exibe);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHP | FATEC :::: Lista de Pedidos</title>

</head>



<body>

<table width="400" border="0">

  <tr>

    <td colspan="3"><strong>Cliente:</strong> <?php print $usuario; ?></td>

  </tr>

  <tr>

    <td><strong>Pedido</strong></td>

    <td><strong>Data</strong></td>

    <td><strong>Valor Total</strong> </td>

  </tr>

  <?php 

  

  	while ($r_exibe = mysql_fetch_array($q_exibe)){

	

		$data = data_formatada($r_exibe[1]);

	

  		print 

			  "<tr>

				<td><a href=\"mostra_pedido.php?pedidoid=".$r_exibe[0]."\">".$r_exibe[0]."</a></td>

				<td>".$data."</td>

				<td>".number_format($r_exibe[2], 2, ",", ".")."</td>

			  </tr>";

			  

	}

  

  ?>