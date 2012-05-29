<?php

ob_start();

include("conecta.php");



//SE CLICOU NO BOTÃO DE ATUALIZAR

if(isset($_POST['updcad'])){

 $nome =$_POST['rotulo'];

 $ordem = $_POST['ordem']; 

 

 //BUSCAR O IDCATEGORIA

 if(isset($_POST['idsubcat'])){;

 	$idsubcat = $_POST['idsubcat'];

		if(isset($_POST['idcat'])){

			 	$idcat = $_POST['idcat'];

	//UPDATE DA CATEGORIA

	$upd_subcat = "UPDATE subcategoria

				  SET nome = '$nome',

				  ordem = $ordem

				  WHERE id_subcat = $idsubcat";

	$q_upd_subcat = mysql_query($upd_subcat);

	}

 }

//REDIRECIONAR PARA PÁGINA DE EXIBIÇÃO DE CATEGORIAS

	header("location:exibe_subcategoria.php?idcategoria=".$idcat."&frase=3");

	}else{

	header("location:form_upd_categoria.php?frase=1");

}



?>

<body>

</body>

</html>

