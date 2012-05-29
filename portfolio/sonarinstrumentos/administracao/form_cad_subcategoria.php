<?php include("valida_login.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><script language="JavaScript" type="text/javascript" src="js/funcoes.js"></script>

<script language="javascript" type="text/javascript">

<!--

//VALIDAÇÃO DOS FORMULÁRIOS

function Valida(){

         if(!CampoObrigatorio(document.ins_subcat.rotulo)){

				 alert('O nome da categoria está vazio');

				 					document.ins_subcat.rotulo.focus();

				 return false;	 

				 }else if(!NumeroObrigatorio(document.ins_subcat.ordem)){

				 alert('A ordem deve ser preenchida e ser um número');

				 					document.ins_subcat.ordem.focus();

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

  

   if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

			

				if($frase ==1){

				print '<p>ERRO: <strong>ORDEM já existe!</strong></p>';

					}

					}

  //OBTER O IDCATEGORIA

  

  if(isset($_GET['idcategoria'])){

  $idcat = $_GET['idcategoria'];

  }

  ?>

    <p><span class="titadm"><img src="../imgs/adm_painel_adicionar.gif" width="20" height="20" hspace="4" />Inserir Categoria </span>

   <?php 

   

   include("conecta.php");

    //PEGAR CATEGORIA E SUBCATEGORIA PARA EXIBIR AO USUÁRIO

$sel_categoria = "SELECT nome FROM categoria WHERE id_categoria = '$idcat'";

$q_sel_categoria = mysql_query($sel_categoria);



$r_cat = mysql_fetch_array($q_sel_categoria);

$nome_categoria = $r_cat[0];



print "<p>Inserir categoria em:<b> ".$nome_categoria."</b></p>";?>

<form action="sql_cad_subcat.php" name="ins_subcat" method="post" onsubmit="javascript:return Valida(this)">

<input type="hidden" name="idcat" value="<?php print $idcat; ?>" />

Nome:

  <input type="text" name="rotulo" />

<br />

Ordem:

<input type="text" name="ordem" size="3" />

<br />

<input type="submit" value="gravar" name="cad" />

<input type="reset" value="limpar" name="cad" />

</form>

    

<br />

<a href="javascript:history.back();"><strong>Voltar</strong></a>

</p>

</div>



</div>



</div>







</body>

</html>

