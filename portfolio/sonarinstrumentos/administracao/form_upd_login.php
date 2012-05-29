<?php include("valida_login.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" />

<title>..: Sonar Instrumentos - Administra&ccedil;&atilde;o</title>

<style type="text/css">

<!--

.titadm3 {color: #0065CE}

-->

</style>

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

  <a href="exibe_usuarios.php"><?php include("menu.php");?>

      <?php



if(isset($_GET['id']) && is_numeric($_GET['id'])){

	$id = $_GET['id'];

	

//CONECTAR AO BANCO

	include("conecta.php");



//COMANDO SQL PARA BUSCAR VALORES DE LOGIN

$sel_login = "SELECT usuario,senha,perm,status FROM login WHERE id='$id'";

$q_sel_login = mysql_query($sel_login);



//OBTENDO VALORES DO BANCO

$r_sel_login = mysql_fetch_array($q_sel_login);

	$nome_usuario = $r_sel_login[0];

	$senha = $r_sel_login[1];

	$permissao = $r_sel_login[2];

	$status = $r_sel_login[3];



}else{

print "erro";



}

?>

<h1 class="titadm"><span class="titadm3"><br />

  </span><img src="../imgs/adm_painel_atualiza.gif" width="16" height="16" hspace="4" />Alterar Login:<br />

  <br />

</h1>

Usuário:<strong> <?php print $nome_usuario; ?></strong>



<form name="upd_login" method="post" action="sql_grava_login.php">

	<input type="hidden" name="id" value="<?php print $id ?>" />

	Digite a senha Antiga:	

	<input type="password" name="senha" /><br />

	Nova Senha: 

	<input type="password" name="novasenha" /><br />

	Confirmar nova senha:	

	<input type="password" name="conf_novasenha" /><br />

	Permissão:

	<select name="perm">

	<option value="0" <?php if($permissao == 0){

		print 'selected="selected"';

		}

	?> >Administrador</option>

	<option value="1" <?php if($permissao == 1){

		print 'selected="selected"';

		}

		?> >Usuário</option>

	<option value="2" <?php if($permissao == 2){

		print 'selected="selected"';

		}

		?> >Fornecedor</option><br />

	</select>

	<br />

	<strong><br />

	Status:</strong><br />

	Ativo: <input name="status" <?php if($status == 0){

		print 'checked="checked"';

		}

		?> type="radio" value="0" />

     Inativo:<input name="status" type="radio" <?php if($status == 1){

		print 'checked="checked"';

		}

		?> value="1" />

   <br />

   <input type="submit" name="bt_updlogin" value="alterar" />

   <input type="reset" name="bt_updlogin" value="limpar" />	

</form>

<br />

<a href="javascript:history.back();"><strong>Voltar</strong></a><br />

    </p>

</p>

</div>



</div>



</div>







</body>

</html>

