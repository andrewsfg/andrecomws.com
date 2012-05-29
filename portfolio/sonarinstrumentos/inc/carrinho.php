<?php

if(isset($_GET['id'])){

$id = $_GET['id'];

}

// CONECTAR AO BANCO

include("administracao/conecta.php");

//ESSA VARIAVEL SERA UTILIZADA PARA CHECAR SE O PRODUTO EXISTE

$existe =0;

//ATRIBUIR SESSION AO ARRAY

if (isset ($_SESSION['carrinho'])){

		$carrinho = $_SESSION['carrinho'];

	}

//COMANDOS A SEREM EXECUTADOS SE O BOTÃO DE ATUALIZAR FOR SETADO

if(isset($_POST['bt_atual'])){

//SE O CAMPO DE EXCLUSÃO FOI SETADO

  if(isset($_POST['exclui'])){

//ATRIBUINDO O ARRAY CRIADO A VARIAVEL DEL

   $del = $_POST['exclui'];

//VARRENDO O ARRAY DEL

	 foreach($del as $id =>$v){

//APAGANDO TODOS OS ITENS DO ARRAY CARRINHO QUE TENHAM O MESMO ID DO ARRAY DEL

	    unset($carrinho[$id]);

	   }

//SE O EXCLUSÃO NÃO SETADO

   }else{

//ATRIBUINDO O ARRAY A VARIAVEL Q

	  $q = $_POST['qtde'];

		

		foreach($carrinho as $id => $valor){

		//REATRIBUINDO O VALOR ENVIADO AO ARRAY

		  $carrinho[$id]['qtde'] = $q[$id];

			//SE O VALOR ENVIADO FOR IGUAL A 0 ARRAY RECEBE 1

			if($q[$id]==0){

			 $carrinho[$id]['qtde'] = 1;

			}

		}

	 }

 }

	

//RECEBENDO O ID DO PRODUTO...

if (isset ($_GET['id']) && !isset ($_POST['bt_atual'])){

	

		

		$pid = $_GET['id'];

		

		

		if (isset ($carrinho) && is_array ($carrinho) && count ($carrinho) > 0){

		

			

			foreach ($carrinho as $id => $dados){

			

				

				if($id == $pid){

					

					$carrinho[$id]['qtde'] += 1;

					$existe = 1;				

				}

			

			}

			

			

			if ($existe == 0){

				

				$carrinho[$pid]['qtde'] = 1;

				

			

			}

			

		}else {

		

			$carrinho[$pid]['qtde'] = 1;

			

		

		}

		

	}





?>

  <head>

    <title></title>

  </head>

  <body>

    <form action="" method="post">

      <table border="0"  width="600">

	    <tr>

		  <td><div align="center"><strong>Excluir</strong></div></td>

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

				  <td><input type="checkbox" name="exclui['.$produto_id.']" value="'.$produto_id.'" /></td>

				  <td>'.$r_prod[0].'</td>

				  <td><input type="text" name="qtde['.$produto_id.']" value="'.$carrinho[$produto_id]['qtde'].'" size="3" /></td>

				  <td>'.number_format($r_prod[1], 2, ",", ".").'</td>

				  <td>'.$r_prod[2].'</td>

				  <td>'.number_format($total, 2, ",", ".").'</td></tr>';

				

				$total_geral+=$total;

			}

			}else{

			print "<h3>SEU CARRINHO ESTÁ VAZIO</h3>";

			}

			

		?>

		<tr>

		  

		  <td colspan="6" align="center">

		    <input type="submit" name="bt_atual" value="Atualizar Carrinho" />		  </td>

		</tr>

		<tr>

		  <td colspan="5">&nbsp;</td>

		  <td>R$<?php  echo number_format($total_geral, 2, ",", ".")?></td>

		</tr>

		<tr>

		  <td colspan="4"><h3><a href="index.php">Continuar Comprando</a></h3></td>

			<td colspan="2"><h3><a href="pedido.php">Fechar Pedido</a></h3></td>

		</tr>

	  </table>

  </form>

  </body>

	<?php

	 $_SESSION['carrinho'] = $carrinho;

	 

	  ?>

