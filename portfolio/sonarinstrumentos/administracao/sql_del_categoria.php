<?php



ob_start();

//DELETAR LOGIN



if(isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])){



$id_login = $_GET['id'];



include("conecta.php");



$del_login = "DELETE FROM login WHERE id = $id_login";

$q_del_login = mysql_query($del_categoria);



header("location:adm.php?pag=4&frase=8");

}else{

print "erro";

}





?>