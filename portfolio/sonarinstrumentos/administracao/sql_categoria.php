<?php

//necess�rio para header location

ob_start();

//inserindo categoria



//valida��o do formul�rio

//validando se usu�rio clicou no bot�o de gravar



if(isset($_POST['bt_cadcategoria'])){

	//verificando se o NOME foi setado, se n�o est� vazio e se � maior que 30 caracteres

	if(isset($_POST['nome']) and !empty($_POST['nome']) and strlen($_POST['nome']) < 30){

		//obtendo valor do campo NOME

		$categoria_nome = $_POST['nome'];

			//se o campo ordem estiver setado e n�o estiver v�zio e for um n�mero fa�a

			if(isset($_POST['ordem']) and !empty($_POST['ordem']) and is_numeric($_POST['ordem'])){

			//obtendo valor do campo ORDEM

			$categoria_ordem = $_POST['ordem'];

			

			//conectando ao banco de dados

			

			include("conecta.php");

			

			//verificando se categoria n�o existe 

			

			$sel_categoria = "SELECT nome FROM categoria WHERE nome = '$categoria_nome'";

			$q_sel_categoria = mysql_query($sel_categoria);

			$r_categoria = mysql_num_rows($q_sel_categoria);

			//se resultado for 0 quer dizer que n�o existe categoria

			if($r_categoria == 0){

				//verificando se a ordem j� n�o est� em uso

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

			//ir para p�gina com as categorias cadastradas

			header("location:exibe_categoria.php?frase=1");

				//}else{

				//print "o n�mero de ordem pertence a outra categoria";

				//}

			}else{

			print "categoria j� existe";

			}

			}else{

			print "erro na ordem";

			}

	}else{

	print "erro no nome";

	}

}else{

//caso usu�rio n�o clicou no bot�o gravar

header("location:index.php");

}



?>