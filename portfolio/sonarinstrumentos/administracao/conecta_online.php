<?php

//ESSE ARQUIVO DE CONEX�O S� � UTILIZADO PARA A CONEX�O COM O BANCO DE DADOS ON-LINE

//CONECTANDO AO BANCO DE DADOS



$servidor_db="localhost";

$usuario_db="refinkco_andrews";

$senha_db="scph7001";

							 

$conexao=mysql_connect($servidor_db,$usuario_db,$senha_db);

					 

if(mysql_select_db("refinkco_banco",$conexao)){

		}else{

	print "<h3>banco com problemas</h3>";

	}



?>																	