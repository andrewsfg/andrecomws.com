<?php include("valida_login.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script language="JavaScript" type="text/javascript" src="js/funcoes.js"></script>

<script language="javascript" type="text/javascript">

<!--

//VALIDAÇÃO DOS FORMULÁRIOS

function Valida(){

         if(!CampoObrigatorio(document.upd_cat.rotulo)){

				 alert('O nome da categoria está vazio');

				 					document.upd_cat.rotulo.focus();

				 return false;	 

				 }else if(!NumeroObrigatorio(document.upd_cat.ordem)){

				 alert('A ordem deve ser preenchida e ser um número');

				 					document.upd_cat.ordem.focus();

				 return false;

				 }else{

				 return true;

				 }

			}

			

//-->

</script>

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



  <?php include("menu.php");

 //VERIFICAR SE SETOU O ID DA CATEGORIA

 if(isset($_GET['idcategoria'])){

 $id = $_GET['idcategoria'];

 

   include("conecta.php");

  

 

 $sel_categoria = "SELECT nome,ordem FROM categoria WHERE id_categoria = $id";

 $q_sel_categoria = mysql_query($sel_categoria);

 

 $r_cat = mysql_fetch_array($q_sel_categoria);

 $nome = $r_cat[0];

 $ordem = $r_cat[1];

  }

  ?>

    <p class="titadm"><img src="../imgs/adm_painel_atualiza.gif" width="16" height="16" hspace="4" />Alterar Categoria:<br />

    <br /></p>

    <form action="sql_upd_cat.php" name="upd_cat" method="post"  onsubmit="javascript:return Valida(this)" >

<input type="hidden" name="idcat" value="<?php print $id;?>" />

Nome:

  <input type="text" name="rotulo" value="<?php print $nome;?>" />

<br />

Ordem:

<input type="text" name="ordem" size="3" value="<?php print $ordem;?>" />

<br />

<input type="submit" value="Alterar" name="updcad" />

<input type="reset" value="limpar" name="updcad" />

</form>

    

</p>

<p><a href="javascript:history.back();"><strong>Voltar</strong></a></p>

</div>



</div>



</div>







</body>

</html>

