<?php

ob_start();

include("conecta.php");



$categoria = $_POST['categoria'];

$subcategoria = $_GET['subcat'];



//deletando o produto

//se alguma opçao no select for selecionada entra no if

if(isset($_POST['funcao'])){

  //Atribuindo o valor do select a variavel $comando

  $comando = $_POST['funcao'];

 // se for escolhido excluir a variavel $comando sera igual a 1

  if($comando ==1){

  //$del recebe o array alterar(todos os que foram checados)

  $del = $_POST['alterar'];

   //laço que atribui todos os ids dos produtos checados a $exclui

   foreach($del as $exclui){

    //query que deleta todos os produtos checados

     $del_prod =" DELETE FROM produtos WHERE id_produto = '$exclui'";

	 //query qye deleta todos as imagens dos produtos que foram deletados

	  $del_img_prod =" DELETE FROM prod_img WHERE id_produto = '$exclui'";

	//executando a query de deleção de produto

	 mysql_query($del_prod);

	 //executando a query de deleção de imagem

	 mysql_query($del_img_prod);

	 

      }

	  header("location:exibe_produtos.php?cat=$categoria&subcat=$subcategoria&frase=4");	

    }

	//se for selecinado as opções destaque(2) ou não destaque(3) entr no if

    elseif($comando ==2 || $comando ==3){

	//alter recebe array alterar

	 $alter = $_POST['alterar'];

	 //se variavel igual a 2(destaque) a variavel $destaque recebe 1 senão $destaque recebe 0

	 if($comando==2){$destaque = 2;}else{$destaque = 1;}

	//laço foreach  

 foreach($alter as $update){

  $upd_dest ="UPDATE produtos SET status=$destaque  WHERE id_produto =$update";

  mysql_query($upd_dest);

   }



  }

  //COMANDO PARA DESATIVAR PRODUTO

  elseif($comando ==0){

	//ALTER RECEBERÁ O VALOR VINDO DO FORMULÁRIO

	 $alter = $_POST['alterar'];

	 //SE VARIÁVEL IGUAL A 0(INATIVO) RECE 0 PARA O STATUS INATIVO

	 if($comando==0){

	 $inativo = 0;

	 }

	//laço foreach  

 foreach($alter as $update){

  $upd_dest ="UPDATE produtos SET status=$inativo  WHERE id_produto =$update";

  mysql_query($upd_dest);

   }

   header("location:exibe_produtos.php?cat=$categoria&subcat=$subcategoria&frase=5");	

  }

  //DEFINIR PRODUTO COMO DESTAQUE DA PÁGINA PRINCIPAL

  elseif($comando ==4){

	//ALTER RECEBERÁ O VALOR VINDO DO FORMULÁRIO

	 $alter = $_POST['alterar'];

	 //SE VARIÁVEL IGUAL A 0(INATIVO) RECE 0 PARA O STATUS INATIVO

	 if($comando==4){

	 $inativo = 3;

	 }

	//laço foreach  

 foreach($alter as $update){

  $upd_dest ="UPDATE produtos SET status=$inativo  WHERE id_produto =$update";

  mysql_query($upd_dest);

   }

   header("location:exibe_produtos.php?cat=$categoria&subcat=$subcategoria&frase=6");	

  }

  elseif($comando ==5){

	//ALTER RECEBERÁ O VALOR VINDO DO FORMULÁRIO

	 $alter = $_POST['alterar'];

	 //SE VARIÁVEL IGUAL A 0(INATIVO) RECE 0 PARA O STATUS INATIVO

	 if($comando==5){

	 $inativo = 1;

	 }

	//laço foreach  

 foreach($alter as $update){

  $upd_dest ="UPDATE produtos SET status=$inativo  WHERE id_produto =$update";

  mysql_query($upd_dest);

   }

   header("location:exibe_produtos.php?cat=$categoria&subcat=$subcategoria&frase=6");	

  }

}



if(isset($_POST['alterar'])){

//obtendo o id_produto vindo da página upd_produtos.php

$id_produto = $_POST['idproduto'];

//obtendo os valores que foram atualizados da página de alteração

$nome = $_POST['nome'];

$desc_curta = $_POST['desc_curta'];

$desc_longa = $_POST['desc_longa'];

$categoria = $_POST['categoria'];

$subcategoria = $_POST['subcategoria'];

$preco = $_POST['preco'];

$peso = $_POST['peso'];

$estoque = $_POST['estoque'];

$est_min = $_POST['est_min'];

$status = $_POST['status'];



//comando sql para atualizar produto

$upd_produto = "UPDATE produtos

SET nome = '$nome',

desc_curta = '$desc_curta',

desc_longa = '$desc_longa',

categoria_id = '$categoria',

subcat_id = '$subcategoria',

preco = '$preco',

peso = '$peso',

estoque = '$estoque',

estoque_min = '$est_min',

status = '$status'

WHERE id_produto = $id_produto";



//comando para executar a query de atualizar produto

$q_upd_produto = mysql_query($upd_produto);

header("location:exibe_produtos.php?cat=$categoria&subcat=$subcategoria&frase=3");

}



//se clicou no botão de inserir produto

if(isset($_POST['inserir'])){

//obtendo os valores

$nome = $_POST['nome'];

$desc_curta = $_POST['desc_curta'];

$desc_longa = $_POST['desc_longa'];

$categoria = $_POST['categoria'];

$subcategoria = $_POST['subcategoria'];

$preco = $_POST['preco'];

$peso = $_POST['peso'];

$estoque = $_POST['estoque'];

$est_min = $_POST['est_min'];

$status = $_POST['status'];



$ins_produto = "INSERT INTO produtos(nome,desc_curta,desc_longa,preco,peso,estoque,estoque_min,status,categoria_id,subcat_id)

VALUES('".$nome."','".$desc_curta."','".$desc_longa."','".$preco."','".$peso."','".$estoque."','".$est_min."','".$status."','".$categoria."',".$subcategoria.")";

print $ins_produto;

mysql_insert_id();



//OBTENDO O ID DO PRODUTO PARA A IMAGEM

if (mysql_query($ins_produto)){

	$id = mysql_insert_id();

	

	set_time_limit(0);

	

	$dir = "imgs/".$id;

	mkdir ("../".$dir,0755);

	

	// ENVIO DA IMAGEM AMPLIADA

	if ($_FILES['img_ampli']['size'] != 0){

		if (move_uploaded_file($_FILES['img_ampli']['tmp_name'], "../".$dir."/" . $_FILES['img_ampli']['name'])) {

		   $nome_antigo = $_FILES['img_ampli']['name']; 

		   $ext = substr ($nome_antigo, -4);

		   $nome_novo = "vit_".$id.$ext;

		   rename("../".$dir."/".$nome_antigo, "../".$dir."/".$nome_novo);

		  //TIPO 0 REPRESENTA AMPLIADA

		   $tipo = 0; 

		   

		   $ins_img = "INSERT INTO prod_img (nome, caminho, id_produto, tipo, status) VALUES ('$nome_novo', '$dir/', '$id', '$tipo', 0)";

						   

		   mysql_query($ins_img);

		   

		}

		else{

		print "imagem já existe";

		}

	}



	// ENVIO DA IMAGEM THUMB

	if ($_FILES['img_peq']['size'] != 0){

		if (move_uploaded_file($_FILES['img_peq']['tmp_name'], "../".$dir."/" . $_FILES['img_peq']['name'])) {

		   $nome_antigo = $_FILES['img_peq']['name']; 

		   $ext = substr ($nome_antigo, -4);

		   $nome_novo = "det_".$id.$ext;

		   rename("../".$dir."/".$nome_antigo, "../".$dir."/".$nome_novo);

		   $tipo = 1;

		   //TIPO 1 É IMAGEM THUMBNAIL PEQUENA

		   

		   $ins_img = "INSERT INTO prod_img (nome, caminho, id_produto, tipo, status) VALUES ('$nome_novo', '$dir/', '$id', '$tipo', 0)";

						   

		   mysql_query($ins_img);

		   

		}

	}else{

	//SE USUÁRIO NÃO ENVIAR IMAGEM, COLOCAR A IMAGEM PADRÃO

	$ins_img = "INSERT INTO prod_img (nome, caminho, id_produto, tipo, status) VALUES ('sem_imagem.gif', 'imgs/', '$id', '1', 0)";

						   

		   mysql_query($ins_img);

		   

		}

			   header("location:exibe_produtos.php?cat=$categoria&subcat=$subcategoria&frase=1");

}



}







?>





