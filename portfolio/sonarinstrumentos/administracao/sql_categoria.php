<?php

//necessбrio para header location

ob_start();

//inserindo categoria



//validaзгo do formulбrio

//validando se usuбrio clicou no botгo de gravar



if(isset($_POST['bt_cadcategoria'])){

	//verificando se o NOME foi setado, se nгo estб vazio e se й maior que 30 caracteres

	if(isset($_POST['nome']) and !empty($_POST['nome']) and strlen($_POST['nome']) < 30){

		//obtendo valor do campo NOME

		$categoria_nome = $_POST['nome'];

			//se o campo ordem estiver setado e nгo estiver vбzio e for um nъmero faзa

			if(isset($_POST['ordem']) and !empty($_POST['ordem']) and is_numeric($_POST['ordem'])){

			//obtendo valor do campo ORDEM

			$categoria_ordem = $_POST['ordem'];

			

			//conectando ao banco de dados

			

			include("conecta.php");

			

			//verificando se categoria nгo existe 

			

			$sel_categoria = "SELECT nome FROM categoria WHERE nome = '$categoria_nome'";

			$q_sel_categoria = mysql_query($sel_categoria);

			$r_categoria = mysql_num_rows($q_sel_categoria);

			//se resultado for 0 quer dizer que nгo existe categoria

			if($r_categoria == 0){

				//verificando se a ordem jб nгo estб em uso

				//$sel_categoriaordem = "SELECT ordem FROM categoria WHERE ordem = '$categoria_ordem'";

				//$q_sel_categoriaordem = mysql_query($sel_categoriaordem);

				//$r_categoriaordem = mysql_num_rows($q_sel_categoriaordem);

				//if($r_categoriaordem == 0){

				

				$categoria_pai = $_POST['categoriapai'] + 1;

				

			//inserindo categoria

			$ins_categoria = "INSERT INTO categoria(id_categoria_pai,nome,ordem) VALUES

			($categoria_pai,'$categoria_nome',$categoria_ordem)";

			//executando a query

			$q_categoria = mysql_query($ins_categoria);

			//ir para pбgina com as categorias cadastradas

			header("location:exibe_categoria.php?frase=1");

				//}else{

				//print "o nъmero de ordem pertence a outra categoria";

				//}

			}else{

			print "categoria jб existe";

			}

			}else{

			print "erro na ordem";

			}

	}else{

	print "erro no nome";

	}

}else{

//caso usuбrio nгo clicou no botгo gravar

header("location:index.php");

}



?>