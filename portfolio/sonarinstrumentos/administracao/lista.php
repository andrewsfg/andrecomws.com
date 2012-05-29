







<?php

include("conecta.php");

?>

<b>Lista de Produtos</b>

<form action="cadastra.php" method="post">



<table border="1" align="center" width="100%" id="tabela">

  <tr>

  	<td>Alterar</td>

    <td>Imagem pequena</td>

	<td>Destaque</td>

	<td>Produto</td>

	<td>Preço</td>

	<td>Peso</td>

	<td>Categoria</td>

	<td>Estoque</td>

	<td>Estoque Minimo</td>

	<td>Alterar Produto</td>

	

	</tr>

	<tr>

<?php





$sel_prod ="SELECT * FROM produtos";



$q_prod = mysql_query($sel_prod);

print '

       <select name="funcao" onChange="this.form.submit();">

         <option value="">Opções</option>

		 <option value="1">excluir</option>

         <option value="2">Destaque</option>

         <option value="3">Não destaque</option>

       </select>';





//pegando imagem do produto

 while($r_prod = mysql_fetch_array($q_prod)){

 

 print' <td><input name="alterar[]" type="checkbox" value="'.$r_prod[0].'"/></td>';



$sel_img_prod ="SELECT caminho,nome FROM prod_img WHERE id_produto = $r_prod[0] and tipo = 1";

$q_prod_img = mysql_query($sel_img_prod);

	while($r_prod_img = mysql_fetch_array($q_prod_img)){

		$img_pasta = $r_prod_img[0];

		$img_nome = $r_prod_img[1];

	print '<td><img width="100" height="100" src="../'.$img_pasta.''.$img_nome.'"/><br />

	<a href="form_upd_imagem.php?id='.$r_prod[0].'" />Trocar imagens</a>

	</td>';

		}

		

   

			if($r_prod[8]==1){

			 $desc = "Sim";

			 }else{

			  $desc = "Não";

			  }

			  print'

			<td>'.$desc.'</td>

			<td>'.$r_prod[1].'</td>

			<td>R$'.number_format($r_prod[4], 2, ",", ".").'</td>

			<td>'.number_format($r_prod[5],0).'Kg</td>

			<td>'.$r_prod[9].'</td>

			<td>'.$r_prod[6].'</td>

			<td>'.$r_prod[7].'</td>';

			//recebe o id produto para uma variável

			$idproduto = $r_prod[0];

			//link para alterar o produto e deletar

			print '<td><a href="form_upd_produto.php?&idproduto='.$idproduto.'">Alterar Produto</a></td>

			

		</tr>';

   }

?>



</table>

</form>



