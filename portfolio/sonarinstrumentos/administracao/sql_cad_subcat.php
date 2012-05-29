<?php

ob_start();

include("conecta.php");



if(isset($_POST['cad'])){

 $nome =$_POST['rotulo'];

 $ordem = $_POST['ordem']; 

 //BUSCAR O IDCATEGORIA

 if(isset($_POST['idcat']));

 	$idcat = $_POST['idcat'];

 $sel_cat = "SELECT ordem FROM subcategoria WHERE ordem = $ordem AND id_categoria = $idcat";

 $q_sel_cat = mysql_query($sel_cat);

 $r_cat = mysql_fetch_array($q_sel_cat);

 $l_ordem = mysql_num_rows($q_sel_cat);

 if($l_ordem == 0){

 $ins_categoria = "INSERT INTO subcategoria(id_categoria,nome,ordem) VALUES

($idcat,'$nome',$ordem)";

//EXECUTAR QUERY

 $q_categoria = mysql_query($ins_categoria);

//REDIRECIONAR PARA PÁGINA DE EXIBIÇÃO DE CATEGORIAS

	header("location:exibe_subcategoria.php?idcategoria=$idcat&frase=1");

	}

}



?>

<body>

</body>

</html>

