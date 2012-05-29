<?php 

ob_start();

	$carrinho = $_SESSION['carrinho'];	

		//SE USUÁRIO NÃO LOGOU - REDIRECIONA PARA LOGAR

	if (!isset($_SESSION['usuario'])){

		header("location:logar.php?carr=1");

		}

		

		if(isset($_GET['pedidoid'])){

		$pedido_id = $_GET['pedidoid'];

		

	//OBTER VALORES DO PEDIDO

	$s_exibe = "SELECT produto_id, pedido_item_qtde,pedido_item_valor FROM pedido_item WHERE pedido_id = '$pedido_id'";

	$q_exibe = mysql_query ($s_exibe);



?>

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

			"<p><strong>Nome do produto:</strong> ".$r_produto['nome'].

			    "<br /><strong>Quantidade:</strong> ".$r_exibe[1].

				"<br /><strong>Valor:</strong>

			    ".number_format($preco, 2, ",", ".")."

			     <br /><strong>Valor total: </strong>

			    ".number_format($preco_total, 2, ",", ".")."<br /></p>

	    	";

			

	   $total_pedido += $preco_total;

	}

	print "<h3>Total do Pedido: ".

		number_format($total_pedido, 2, ",", ".")."</h3>";

		}

?>