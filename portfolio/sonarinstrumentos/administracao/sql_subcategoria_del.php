<?php



ob_start();

//deletar categoria



if(isset($_GET['idcategoria']) and !empty($_GET['idcategoria']) 

and is_numeric($_GET['idcategoria'])){



//ID CATEGORIA

$id_cat = $_GET['cat'];

//ID SUBCATEGORIA

$id_categoria = $_GET['idcategoria'];



include("conecta.php");

$del_categoria = "DELETE from subcategoria WHERE id_subcat = $id_categoria";

$q_del_categoria = mysql_query($del_categoria);

header("location:exibe_subcategoria.php?idcategoria=".$id_cat."&frase=2");

}else{

print "erro";

}





?>