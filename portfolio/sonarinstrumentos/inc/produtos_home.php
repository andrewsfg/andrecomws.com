<?php

//COMANDO SQL PARA EXIBIR PRODUTOS NA PÁGINA INICIAL

$sel_prod = "SELECT id_produto,nome,desc_curta,preco,categoria_id FROM produtos WHERE status = 3";

$q_sel_prod = mysql_query($sel_prod);

//CASO NÃO HAJA PRODUTOS, EXIBA MENSAGEM

if(mysql_num_rows($q_sel_prod) ==0){

print "nenhum produto cadastrado";

}



//ATRIBUIR VALORES DO BANCO E EXIBIR PRODUTOS

while($r_prod = mysql_fetch_array($q_sel_prod)){

	$id_prod = $r_prod[0];

	$nome = $r_prod[1];

	$desc_curta = $r_prod[2];

	$preco = $r_prod[3];

	$idcat = $r_prod[4];	

	//COMANDO SQL PARA BUSCAR NO BANCO IMAGEM MINIATURA

	$sel_img_th = "SELECT id_imagem,nome,caminho FROM prod_img WHERE tipo = 1 and id_produto = $id_prod";

	$q_sel_img_th = mysql_query($sel_img_th);



		//EXIBIR IMAGEM

		while($r_img_th = mysql_fetch_array($q_sel_img_th)){

			$id_img = $r_img_th[0];

			$nome_img_th = $r_img_th[1];

			$caminho_img_th = $r_img_th[2];

			print '<div id="produto"><a href="detalhes_produto.php?cat='.$idcat.'&id='.$id_prod.'"><img src="'.$caminho_img_th.$nome_img_th.'" width="100" height="100" hspace="5" vspace="0" border="0" alt="Ver - '.$nome.'" title="Ver - '.$nome.'" /><br /></a>';

		}

	

	//IMPRIMINDO DADOS DO PRODUTO

	print '<a href="detalhes_produto.php?cat='.$idcat.'&id='.$id_prod.'">';

	print $nome."<br />";

	print $desc_curta."<br />";

	print "<strong>Apenas: </strong><span class='preco'>R$".$preco."</a></span></p></div>";

	}



?>