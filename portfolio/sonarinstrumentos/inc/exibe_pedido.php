<?php 



	if (!isset ($_SESSION['usuario'])){

	

		header("location:logar.php");

	

	}

	

    $usuario = $_SESSION['usuario'];

	

	$pedidoid = $_GET['pedidoid'];



	$s_exibe = "SELECT produto_id,pedido_item_qtde,pedido_item_valor,pedido_id FROM pedido_item WHERE pedido_id = $pedidoid";

	$q_exibe = mysql_query ($s_exibe);



?>

<table width="600" border="0" cellpadding="2" cellspacing="2">

  <tr>

    <td colspan="4"><a href="pedido_lista.php">Ver Meus Pedidos</a></td>

  </tr>

  <tr>

    <td colspan="4">Pedido N&ordm; <?php echo $pedidoid; ?></td>

  </tr>

  <tr>

    <td width="160">Produto</td>

    <td width="80">Qtidade</td>

    <td width="80">Pre&ccedil;o</td>

    <td width="80">Total</td>

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

		$pedido = $r_exibe[3];

		

		$s_exibepedido = "SELECT pedido_valor FROM pedido WHERE pedido_id = $pedido";

		$q_exibepedido = mysql_query ($s_exibepedido);

		$r_pedido = mysql_fetch_array($q_exibepedido);

		$total_pedido = $r_pedido[0];

		

		

		print 

			"<tr>

	    		<td>".$r_produto['nome']."</td>

			    <td>".$r_exibe[1]."</td>";

				



		print 



			    "<td>".number_format($preco, 2, ",", ".")."</td>

			    <td>".number_format($preco_total, 2, ",", ".")."</td>

	    	</tr>";

			

			}

?>

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><div align="right">Total - Pedido: </div></td>

    <td><strong>R$ <?php echo number_format($total_pedido, 2, ",", "."); ?></strong></td>

  </tr>

</table>

</body>

</html>

