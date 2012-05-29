<?php 

//SE O ID FOI SETADO E FOR UM NÚMERO PROSSEGUIR

if(isset($_GET['id']) && is_numeric($_GET['id'])){

	$id_prod = $_GET['id'];

	//CONECTAR AO BANCO

	include("administracao/conecta.php");





//COMANDO SQL PARA EXIBIR PRODUTOS

$sel_prod = "SELECT id_produto,nome,desc_longa,preco,peso FROM produtos WHERE id_produto = $id_prod ";

$q_sel_prod = mysql_query($sel_prod);



//ATRIBUIR VALORES DO BANCO E EXIBIR PRODUTOS

while($r_prod = mysql_fetch_array($q_sel_prod)){

	$id_prod = $r_prod[0];

	$nome = $r_prod[1];

	$desc_longa = $r_prod[2];

	$preco = $r_prod[3];	

	$peso = $r_prod[4];

	//COMANDO SQL PARA BUSCAR NO BANCO IMAGEM MINIATURA

	$sel_img_th = "SELECT id_imagem,nome,caminho FROM prod_img WHERE tipo = 0 and id_produto = $id_prod";

	$q_sel_img_th = mysql_query($sel_img_th);



		//EXIBIR IMAGEM

		while($r_img_th = mysql_fetch_array($q_sel_img_th)){

			$id_img = $r_img_th[0];

			$nome_img_th = $r_img_th[1];

			$caminho_img_th = $r_img_th[2];

			print '<div id="imgprod"><img src="'.$caminho_img_th.$nome_img_th.'"

 align="left" vspace="0" border="0" alt="'.$nome.'" title="'.$nome.'" /></div>';

		}

	

	//IMPRIMINDO DADOS DO PRODUTO

	print "<strong><h3>Produto: </strong>".$nome."</h3><br />";

	print "<p class='desclonga'>".$desc_longa."</p><br /><br />";

	print "<strong><h3>Preço: </strong><span class='preco2'>R$".$preco."</span></h3><br />";

	print '<strong><h3><a href="carrinho.php?id='.$id_prod.'"><img src="imgs/btn_comprar.gif" alt="Comprar" title="Comprar" /></a></h3>';

	}



}else{

print "erro";

}

?>