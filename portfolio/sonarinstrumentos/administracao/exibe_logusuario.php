<?php include("valida_login.php");//VALIDA SE USUÁRIO ESTÁ LOGADO PARA PROSSEGUIR?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" />

<title>..: Sonar Instrumentos - Administra&ccedil;&atilde;o</title>

</head>

<body>



<div id="container">



<div id="topoadm"><a href="index.php"><img src="../imgs/topo.jpg" alt="Painel de Administra&ccedil;&atilde;o" border="0" title="Painel de Administração" /></a></div>





<div id="meioadm">

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - CATEGORIAS</h1>

</div>



<div id="contadm"><?php

//VALIDANDO O USUÁRIO

	print "bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar.php">Deslogar</a>';

	

	//SE NÃO FOR ADMINISTRADOR, REDIRECIONAR

	if($_SESSION["perm"] <> 0){

	header("location:../index.php");

	}

?>

</div><div id="paineladm">

  <?php include("menu.php");?>

    <?php 

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>CATEGORIA cadastrada com sucesso.</strong></p>';

			  }elseif($frase==2){

					print '<p>Aviso: <strong>CATEGORIA deletada com sucesso.</strong></p>';			  

					}

					}

			 ?>

  

  <p><span class="titadm"><br />

    Logs de usu&aacute;rios:</span><br />

    <?php 



	include("conecta.php");

	

	$s_log = "SELECT usuario,data_entrada,ip,perm FROM grava_log";

	$q_log = mysql_query ($s_log);

	

	if (mysql_num_rows($q_log) > 0){

	

		while ($r_log = mysql_fetch_array($q_log)){

		//PERMISSÕES CORRETAS

		if($r_log[3] == 0){

			$permissao = "Administrador";

			}elseif($r_log[3] == 1){

				$permissao = "Usuário";

					}elseif($r_log[3] ==2){

						$permissao = "Fornecedor";

						}

		

			print //IMPRIME DADOS DO LOG DE ACESSO DO USUÁRIO

		   		"<div id='admlog'>

					<strong>Data:</strong> ".$r_log[1]."<br />

    				<strong>Usuário:</strong> ".$r_log[0]."<br />

					<strong>IP</strong>: ".$r_log[2]."

					<br /><strong>Permissão:</strong> 

					".$permissao."

  				 </div>";

		}	

  		}else {

		print

	   		"Nenhum log encontrado";

			 

	}

?></p>



</div>



</div>



</div>







</body>

</html>

