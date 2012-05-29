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

  <?php 

  include("conecta.php");

  include("menu.php");

  

 if(isset($_GET['categoria'])){

		$idcat = $_GET['categoria']; 

		$idsub = $_GET['subcategoria'];

		

		$sel_subcat = "SELECT nome,id_categoria,id_subcat FROM subcategoria

						WHERE id_categoria = $idcat AND id_subcat = $idsub";

		$q_sel_cat = mysql_query($sel_subcat);

		$r_subcat = mysql_fetch_array($q_sel_cat);

		$subcategoria = $r_subcat[0];

		$categoria = $r_subcat[1];

		$idsubcat = $r_subcat[2];

		

		$sel_cat = "SELECT nome FROM categoria WHERE id_categoria = $categoria";

		$q_sel_cat = mysql_query($sel_cat);

		$r_cat = mysql_fetch_array($q_sel_cat);

		$nome_cat = $r_cat[0];

		}else{

		print "erro";

		}

  ?>

    <p><span class="titadm">Inserir Produto</span>

    

<form action="sql_cad_prod.php" method="post" enctype="multipart/form-data">

  <table align="center" border="0" cellpadding="1" cellspacing="1" width="100%">

  	<tr>

	  <td>Categoria:</td>

	  <td colspan="2" align="center">

	  <?php 

	  print "<strong>".$nome_cat." > ".$subcategoria."</strong>";

	  ?>

	  <input type="hidden" name="categoria" value="<?php print $categoria;?>" />

	  <input type="hidden" name="subcategoria" value="<?php print $idsubcat;?>" />

	  </td>

	</tr>

    <tr>

	  <td>Nome:</td>

	  <td><input name="nome" type="text" size="50" /></td>

	</tr>

	<tr>

	  <td>Descrição Curta:</td>

	  <td><textarea name="desc_curta" cols="51" rows="3"></textarea></td>

	</tr>

	<tr>

	  <td>Descrição Longa:</td>

	  <td><textarea name="desc_longa" cols="51" rows="6"></textarea></td>

	</tr>

	<tr>

	  <td>Preço:</td>

	  <td><input name="preco" type="text" size="5" /></td>

	</tr>

	<tr>

	  <td>Peso:</td>

	  <td><input name="peso" type="text" size="5" /></td>

	</tr>

	<tr>

	  <td>Estoque:</td>

	  <td><input name="estoque" type="text" size="5" /></td>

	</tr>

	<tr>

	  <td>Est.Min</td>

	  <td><input name="est_min" type="text" size="5" /></td>

	</tr>

	<tr>

	  <td><strong>Imagens:</strong></td>

    </tr>

	<tr>

      <td>Imagem ampliada: </td>

      <td><input name="img_ampli" type="file" id="img_ampli" /></td>

    </tr>

	<tr>

      <td>Imagem pequena: </td>

      <td><input name="img_peq" type="file" id="img_peq" /></td>

    </tr>

	<tr>

	  <th colspan="2">Status</th>

	</tr>

	<tr align="center">

	  <td colspan="2"><input name="status" type="radio" value="0" />

Inativo

  <input name="status" type="radio" value="1" checked="checked" />

Normal

<input name="status" type="radio" value="2" />

Destaque

<input name="status" type="radio" value="3" />

Destaque Principal </td>

	  </tr>

	<tr>

	  <td colspan="2" align="center"><input name="inserir" type="submit" value="Inserir Produto" /></td>

	</tr>

  </table>

</form>



    

</p>

</div>



</div>



</div>







</body>

</html>

