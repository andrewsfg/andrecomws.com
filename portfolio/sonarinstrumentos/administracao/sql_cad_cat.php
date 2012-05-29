<?php

ob_start();

include("conecta.php");



if(isset($_POST['cad'])){

 $nome =$_POST['rotulo'];

 $ordem = $_POST['ordem']; 

 //BUSCAR O IDCATEGORIA

 if(isset($_POST['idcat'];

 	$idcat = $_POST['idcat'];

 $sel_cat = "SELECT ordem FROM subcategoria WHERE ordem = $ordem";

 $q_sel_cat = mysql_query($sel_cat);

 $r_cat = mysql_fetch_array($q_sel_cat);

 $selordem = $r_cat[0];

 if($ordem <> $selordem){

 //COMANDO SQL PARA INSERIR A CATEGORIA

 $ins_categoria = "INSERT INTO subcategoria(id_categoria,nome,ordem) VALUES

($idcat,'$nome',$ordem)";

//EXECUTAR QUERY

 $q_categoria = mysql_query($ins_categoria);

//REDIRECIONAR PARA PÁGINA DE EXIBIÇÃO DE CATEGORIAS

	header("location:exibe_categoria.php?frase=1");

	}else{

	header("location:form_cad_categoria.php?frase=1");

}

}

}

?>

<body>

</body>

</html>

