<?php include("valida_login.php");?>

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

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - USU&Aacute;RIOS</h1>

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

    <?php include("menu.php");?></span>

    <?php //RECEBE MENSAGEM

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>usuário cadastrado com sucesso.</strong></p>';

			  }elseif($frase==2){

					print '<p>Aviso: <strong>usuário deletado com sucesso.</strong></p>';			  				}elseif($frase==3){

					print '<p>Aviso: <strong>ERRO: nenhum usuário foi deletado. [Necessário ID]</strong></p>';

					}

					}

			 ?>

  

  <p class="titadm"><a href="form_cad_login.php"><img src="../imgs/adm_painel_adicionar.gif" width="20" height="20" hspace="4" /></a><a href="form_cad_login.php">Inserir novo usu&aacute;rio</a></p>

  <p>

      <?php 

  

  include("conecta.php");

  //PERMISSÕES DE USUÁRIO

$permissao[0]['num'] = 0;

$permissao[0]['nome'] = "Administrador";



$permissao[1]['num'] = 1;

$permissao[1]['nome'] = "Usuário";



$permissao[2]['num'] = 2;

$permissao[2]['nome'] = "Fornecedor";



//FRASES



//include que mostra as categorias

$sel_login = "SELECT id,usuario,perm,status FROM login ";

$q_sel_login = mysql_query($sel_login);



while($r_sel_login = mysql_fetch_array($q_sel_login)){

print "<div id='admusuario'><img src='../imgs/adm_cliente_logado.gif' align='left' hspace='6' /><p><strong>Usuário:</strong> ".$r_sel_login[1]."<br />";

print "<strong>Permissão:</strong> ";



//NOMEANDO AS PERMISSÕES CONFORME USUÁRIO

	if($r_sel_login[2] == $permissao[0]['num']){

	print $permissao[0]['nome']."<br />";

		}elseif($r_sel_login[2] == $permissao[1]['num']){

		print $permissao[1]['nome']."<br />";

		}elseif($r_sel_login[2] == $permissao[2]['num']){

			print $permissao[2]['nome']."<br /></p>";

			}

;

//LINK PARA ALTERAR LOGIN

print '<a href="form_upd_login.php?id='.$r_sel_login[0].'"><strong>Alterar Conta</strong></a> - ';



//LINK PARA DELETAR LOGIN

print '<a href="sql_del_login.php?id='.$r_sel_login[0].'"><strong>Deletar Conta</strong></a></div>';



}

?>

    

</p>

</div>



</div>



</div>







</body>

</html>

