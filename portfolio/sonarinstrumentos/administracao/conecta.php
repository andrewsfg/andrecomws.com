<?php



//CONECTANDO AO BANCO DE DADOS



$servidor_db="localhost";

$usuario_db="andrews_sonar";

$senha_db="123456";

							 

$conexao=mysql_connect($servidor_db,$usuario_db,$senha_db);

//SELECIONAR BANCO

if(mysql_select_db("andrews_tccfatec",$conexao)){

		}else{

	print "<h3>banco com problemas</h3>";

	}



?>																	