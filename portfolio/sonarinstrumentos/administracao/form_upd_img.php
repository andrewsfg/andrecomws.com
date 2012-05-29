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

<br />

  <?php include("menu.php");

  

   if(isset($_GET['categoria'])){

		$idcat = $_GET['categoria']; 

		if(isset($_GET['subcategoria'])){

			$idsubcat = $_GET['subcategoria']; 

		}

		}

  ?>

    <p><span class="titadm">Alterar Imagens:</span>

    

<form action="sql_upd_imagem.php" method="post" enctype="multipart/form-data" name="upd_imagem" id="upd_imagem">

  <input type="hidden" name="categoria" value="<?php print $idcat;?>" />

  <input type="hidden" name="subcategoria" value="<?php print $idsubcat;?>" />

<input type="hidden" id="id" name="id" value="<?php print $_GET['id']; ?>" />

<table width="500" border="0">

  <tr>

    <td>Imagem ampliada: </td>

    <td><input name="img_ampli" type="file" id="img_ampli" /></td>

  </tr>

  <tr>

    <td width="113">Imagem pequena: </td>

    <td width="371"><input name="img_peq" type="file" id="img_peq" /></td>

  </tr>

  <tr>

    <td colspan="2">&nbsp;</td>

  </tr>

  <tr>

    <td><input name="upd_imagem" type="submit" id="upd_imagem" value="Gravar imagens" /></td>

    <td>&nbsp;</td>

  </tr>

</table></form>



    

</p>

</div>



</div>



</div>







</body>

</html>

