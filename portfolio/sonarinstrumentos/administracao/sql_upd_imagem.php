<?php

ob_start();

//OBTENDO A CATEGORIA PARA REDIRECIONAR CORRETAMENTE

if(isset($_POST['categoria'])){

	$categoria = $_POST['categoria'];

		if(isset($_POST['subcategoria'])){

			$subcat = $_POST['subcategoria'];

			}

}

//se clicou em atualizar imagem

if(isset($_POST['upd_imagem'])){



//obtendo o id do produto a ser deletado

	$id = $_POST['id'];



include("conecta.php");

//comando sql que deleta a imagem



$dir = "imgs/".$id."/";



set_time_limit(0);



	// ENVIO DA IMAGEM AMPLIADA

	if ($_FILES['img_ampli']['size'] != 0){

	

	//OBTENDO OS DADOS DA IMAGEM JÁ CADASTRADA

	$sel_img = "SELECT nome,caminho FROM prod_img WHERE id_produto = $id and tipo = 0";

	

	$q_sel_img = mysql_query($sel_img);

	

		$r_img = mysql_fetch_array($q_sel_img);

		$nome_img = $r_img[0];

		$caminho_img = $r_img[1];

		

			//ANTES DE ACRESCENTAR DELETAR NO BANCO A IMAGEM

		   $del_img_prod = "DELETE FROM prod_img WHERE id_produto = $id and tipo = 0";

		   $q_del_img_prod = mysql_query($del_img_prod);

		   //ANTES DE ACRESCENTAR, DELETAR DA PASTA

		   unlink("../".$dir.$nome_img);



			 

		if (move_uploaded_file($_FILES['img_ampli']['tmp_name'], "../".$dir.$_FILES['img_ampli']['name'])) {

		   $nome_antigo = $_FILES['img_ampli']['name']; 

		   $ext = substr ($nome_antigo, -4);

		   $nome_novo = "ampli_".$id.$ext;

		   rename ("../".$dir.$nome_antigo, "../".$dir.$nome_novo);

		   $tipo = 0; 

		    //TIPO 0 REPRESENTA AMPLIADA

			

		   $ins_img = "INSERT INTO prod_img 

		   				  (nome, caminho, id_produto, tipo, status)

						   VALUES

						   ('$nome_novo', '$dir', '$id', '$tipo', 0)";

			

						   print $ins_img;

		   mysql_query ($ins_img);

		   

		}

		else{

		print "imagem já existe";

		}

	}



	// UPLOAD DA IMAGEM (PRINCIPAL)

	if ($_FILES['img_peq']['size'] != 0){

		

		$sel_img = "SELECT nome,caminho FROM prod_img WHERE id_produto = $id and tipo = 1";

		$q_sel_img = mysql_query($sel_img);

	

		$r_img = mysql_fetch_array($q_sel_img);

		$nome_img = $r_img[0];

		$caminho_img = $r_img[1];

		

			//ANTES DE ACRESCENTAR DELETAR NO BANCO A IMAGEM

		   $del_img_prod = "DELETE FROM prod_img WHERE id_produto = $id and tipo = 1";

		   $q_del_img_prod = mysql_query($del_img_prod);

		   //ANTES DE ACRESCENTAR, DELETAR DA PASTA

		   unlink("../".$dir.$nome_img);



	

		if (move_uploaded_file($_FILES['img_peq']['tmp_name'], "../".$dir.$_FILES['img_peq']['name'])) {

		   $nome_antigo = $_FILES['img_peq']['name']; 

		   $ext = substr ($nome_antigo, -4);

		   $nome_novo = "thumb_".$id.$ext;

		   rename ("../".$dir.$nome_antigo, "../".$dir.$nome_novo);

		   $tipo = 1;//tipo 1 thumbnail miniatura



		   //inserir novas imagens no banco

		   $ins_img = "INSERT INTO prod_img 

		   				  (nome, caminho, id_produto, tipo, status)

						   VALUES

						   ('$nome_novo', '$dir', '$id', '$tipo', 1)";

						   

						      print $ins_img;

		   mysql_query ($ins_img);

		   

		

		//SE ENVIOU CORRETAMENTE E INSERIU NO 

		   

		 header("location:exibe_produtos.php?cat=".$categoria."&subcat=".$subcat."&frase=4");

		   

		}

	}



}else{

print "erro em update";



}



?>