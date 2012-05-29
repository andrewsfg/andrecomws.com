<?php

// CONECTAR AO BANCO

include("administracao/conecta.php");



if (isset ($_GET['conclui_carr']) && $_GET['conclui_carr'] == 1){

$valor_total_pedido = 0;



while(!empty($carrinho)){

//QUERY PARA INSERIR O PRODUTO

$ins_pedido = "INSERT INTO pedido (pedido_data, usuario, pedido_valor)

						   VALUES (NOW(), '".$_SESSION['usuario']."', ".$valor_total_pedido.")";

			mysql_query($ins_pedido);

			

//PEGAR O ÚLTIMO ID

$pedido_id = mysql_insert_id();

		

			foreach ($carrinho as $id => $dados){	

			

				$produto = $id;

				$s_valor = "SELECT preco FROM produtos WHERE id_produto = $produto";

				$q_valor = mysql_query($s_valor);

				$valor = mysql_result($q_valor, 0, "preco");

				

				$valor_total_item = $valor * $carrinho[$id]['qtde'];

				//INSERIR PEDIDO ITEM

				$ins_item = "INSERT INTO pedido_item (pedido_id, produto_id, pedido_item_qtde, pedido_item_valor)

				            VALUES (".$pedido_id.", ".$produto.", ".$carrinho[$id]['qtde'].", ".$valor_total_item.")";

						

				if (mysql_query($ins_item)){

				$valor_total_pedido += $valor_total_item;	

				//com problemas essa parte

					//DAR BAIXA NO ESTOUQE

					//,$upd_estoque = "UPDATE produtos SET estoque = qtde - ".$carrinho[$id]['qtde']." WHERE produto_id = ".$produto."";

				//	mysql_query($upd_estoque);

					



					

			

		

		}

		

		

	

	}



	$upd_pedido = "UPDATE pedido SET pedido_valor = ".$valor_total_pedido." WHERE pedido_id = ".$pedido_id."";

			mysql_query($upd_pedido);

			print $upd_pedido;

			

	unset($carrinho);

	}header("location:mostra_pedido.php?pedidoid=$pedido_id");

	}		

		?>

  <head>

    <title></title>

  </head>

  <body>

    <form action="" method="post">

      <table border="0"  width="600">

	    <tr>

		  <td colspan="5"><h3><a href="index.php"></a>Seu Pedido: </h3></td>

		</tr>

	    <tr>

		  <td><div align="center"><strong>Produto</strong></div></td>

		  <td><div align="center"><strong>Quantidade</strong></div></td>

		  <td><div align="center"><strong>Pre&ccedil;o</strong></div></td>

		  <td><div align="center"><strong>Peso</strong></div></td>

		  <td><div align="center"><strong>Total</strong></div></td>

		</tr>

		<?php

		  $total_geral = 0;

		  if(isset($carrinho)){

		  foreach($carrinho as $id => $dados){

			$produto_id = $id;

		

		  $s_prod = "SELECT nome,preco,peso FROM produtos WHERE id_produto = $produto_id";

		  $q_prod = mysql_query($s_prod);

		  $r_prod = mysql_fetch_array($q_prod);

			

		  $total = $carrinho[$produto_id]['qtde'] * $r_prod[1];

		  

		  print'

		     <tr>

				  <td>'.$r_prod[0].'</td>';

				  print "<td>".$carrinho[$produto_id]['qtde']."</td>";

				 print '<td>'.number_format($r_prod[1], 2, ",", ".").'</td>

				  <td>'.$r_prod[2].'</td>

				  <td>'.number_format($total, 2, ",", ".").'</td></tr>';

				

				$total_geral+=$total;

				

			}

			}

			

		?>

		<tr>

		  <td colspan="3">&nbsp;</td>

		  <td><h3>Valor Final:</h3></td>

		  <td>R$<?php  print number_format($total_geral, 2, ",", ".");

		  

		  number_format($total_geral, 2, ",", ".");

		  ?></td>

		</tr>

		<tr>

			<td colspan="1"><h3><a href="pedido.php?conclui_carr=1">Confirmar Pedido</a> - <a href="index.php">Continuar Comprando</a> </h3></td>

		</tr>

	  </table>

    </form>

  </body>

	<?php if(isset($_SESSION['carrinho'])){

	 $_SESSION['carrinho'] = $carrinho;

	 }

	  ?>

