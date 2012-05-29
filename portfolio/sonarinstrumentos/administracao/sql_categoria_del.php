<?php



ob_start();

//deletar categoria



if(isset($_GET['idcategoria']) and !empty($_GET['idcategoria']) 

and is_numeric($_GET['idcategoria'])){



$id_categoria = $_GET['idcategoria'];



include("conecta.php");

$del_categoria = "DELETE from categoria WHERE id_categoria = $id_categoria";

$q_del_categoria = mysql_query($del_categoria);

header("location:exibe_categoria.php?frase=2");

}else{

print "erro";

}





?>