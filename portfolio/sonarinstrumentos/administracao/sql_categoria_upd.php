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

			

			$id_categoria = $_POST['id_categoria'];

			

			$upd_categoria = "UPDATE categoria

			SET nome = '$categoria_nome', ordem = '$categoria_ordem' 

			WHERE id_categoria = $id_categoria";

			$q_upd_categoria = mysql_query($upd_categoria);

			

			header("location:adm.php?pag=4");

				//}else{

				//print "o nъmero de ordem pertence a outra categoria";

				//}

			

			}else{

			print "erro na ordem";

			}

	}else{

	print "erro no nome";

	}

}else{

//caso usuбrio nгo clicou no botгo gravar

header("location:cadcategoria_form_upd.php");

}



?>