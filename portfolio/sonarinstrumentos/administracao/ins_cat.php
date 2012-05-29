<?php

ob_start();

include("conecta.php");

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

</head>

<?php

if(isset($_POST['cad'])){

 if(!isset($_POST['subcategoria'])){

 $id_pai = 1;

 }else{

  $id_pai = $_POST['subcategoria'];

 }

 $nome =$_POST['rotulo'];

 $ordem = $_POST['ordem']; 

 $ins_categoria = "INSERT INTO categoria(id_categoria_pai,nome,ordem) VALUES

($id_pai,'$nome',$ordem)";

			//executando a query

 $q_categoria = mysql_query($ins_categoria);

			//ir para página com as categorias cadastradas

			header("location:exibe_categoria.php?frase=1");

}else{

if(isset($_POST['categoria'])){

$id = $_POST['categoria'];

}

else if(isset($_POST['subcategoria'])){

$id = $_POST['subcategoria'];

}



header("location:form_cad_categoria.php?subcat=$id");



}

?>

<body>

</body>

</html>

