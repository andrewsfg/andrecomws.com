<?php

//DELETAR LOGIN

ob_start();

//VALIDAR SE ID FOI ENVIADO

if(isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])){



	$id_login = $_GET['id'];//RECEBE ID DO USUมRIO

	

	include("conecta.php");//CONECTAR AO BANCO

	

	$del_login = "DELETE FROM login WHERE id = $id_login";// QUERY DE DELEวรO DO USUมRIO

	$q_del_login = mysql_query($del_login);//QUERY EXECUTA

	

	header("location:exibe_usuarios.php?frase=2");//REDIRECIONA E EXIBE MENSAGEM

}else{

header("location:exibe_usuarios.php?frase=3");//REDIRECIONA E EXIBE ERRO CASO ID NรO FOI SETADO

}





?>