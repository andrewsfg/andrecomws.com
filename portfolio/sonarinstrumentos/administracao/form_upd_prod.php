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

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - PRODUTOS</h1>

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

  <p>

      <?php

include("conecta.php");

?>

  </p>

	 <?php include("menu.php");

	 

	 

	  if(isset($_GET['categoria'])){

		$idcat = $_GET['categoria']; 

		$idsub = $_GET['subcategoria'];

		

		$sel_subcat = "SELECT nome,id_categoria FROM subcategoria

						WHERE id_categoria = $idcat AND id_subcat = $idsub";

		$q_sel_cat = mysql_query($sel_subcat);

		$r_subcat = mysql_fetch_array($q_sel_cat);

		$subcategoria = $r_subcat[0];

		$categoria = $r_subcat[1];

		

		$sel_cat = "SELECT nome FROM categoria WHERE id_categoria = $categoria";

		$q_sel_cat = mysql_query($sel_cat);

		$r_cat = mysql_fetch_array($q_sel_cat);

		$nome_cat = $r_cat[0];

		}else{

		print "erro";

		}

	 ?>

	 </p>

    <?php 

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>PRODUTO cadastrado com sucesso.</strong></p>';

			  }elseif($frase==2){

					print '<p>Aviso: <strong>PRODUTO deletado com sucesso.</strong></p>';

					 }elseif($frase==3){

					print '<p>Aviso: <strong>PRODUTO atualizado com sucesso.</strong></p>';						  

					}

					}

			 ?>

			 

<span class="titadm">Alterar Produto</span><br /><br />

</p>

  

  <?php

if(isset($_GET['idproduto']) and is_numeric($_GET['idproduto']) and

!empty($_GET['idproduto'])){

	$id_produto = $_GET['idproduto'];

	//selecionar o produto a ser alterado

	include("conecta.php");

	$sel_produto = "SELECT nome,desc_curta,desc_longa,

	preco,peso,estoque,estoque_min,status,categoria_id,subcat_id FROM produtos

	WHERE id_produto = $id_produto";

	$q_sel_produto = mysql_query($sel_produto);

	

	//obtendo os valores da tabela e colocando numa variável

	while($r_prod = mysql_fetch_array($q_sel_produto)){

	$nome =	$r_prod[0];

	$desc_curta = $r_prod[1];

	$desc_longa = $r_prod[2];	

	$preco = $r_prod[3];	

	$peso = $r_prod[4];	

	$estoque = $r_prod[5];

	$estoque_min = $r_prod[6];	

	$status = $r_prod[7];

	$categoria_id = $r_prod[8];

	$subcat_id = $r_prod[9];

	

	}

}else{

print "falta idproduto";

}

?>



<form action="sql_cad_prod.php" method="post" enctype="multipart/form-data">

  <table align="center" border="0" cellpadding="1" cellspacing="1" width="100%">

  	<tr>

	  <td>Categoria:</td>

  <td colspan="2" align="center">

	  <?php 

	  print "<strong>".$nome_cat." > ".$subcategoria."</strong>";

	  ?>

	  <input type="hidden" name="subcategoria" value="<?php print $subcat_id;?>" />

	  <input type="hidden" name="categoria" value="<?php print $idcat;?>" />

	  </td>

	</tr>

    <tr>

	  <td>Nome:</td><input type="hidden" name="idproduto" value="<?php print $id_produto; ?>" />

	  <td><input name="nome" type="text" size="50" value="<?php print $nome;?>" /></td>

	</tr>

	<tr>

	  <td>Descrição Curta:</td>

	  <td><textarea name="desc_curta" cols="51" rows="3"><?php print $desc_curta;?></textarea></td>

	</tr>

	<tr>

	  <td>Descrição Longa:</td>

	  <td><textarea name="desc_longa" cols="51" rows="6"><?php print $desc_longa;?></textarea></td>

	</tr>

	<tr>

	  <td>Preço:</td>

	  <td><input name="preco" type="text" size="5" value="<?php print $preco;?>" /></td>

	</tr>

	<tr>

	  <td>Peso:</td>

	  <td><input name="peso" type="text" size="5" value="<?php print $peso;?>" /></td>

	</tr>

	<tr>

	  <td>Estoque:</td>

	  <td><input name="estoque" type="text" size="5" value="<?php print $estoque;?>" /></td>

	</tr>

	<tr>

	  <td>Est.Min</td>

	  <td><input name="est_min" type="text" size="5" value="<?php print $estoque_min;?>" /></td>

	</tr>

	<tr>

	  <td><strong>Status</strong></td>

	</tr>

	<tr>

	<td align="center"></td>

	</tr>

	  <td colspan="2"><input name="status" type="radio" value="0" <?php if($status ==0){ print "checked=checked";}?> />

Inativo

  <input name="status" type="radio" value="1" <?php if($status ==1){ print "checked=checked";}?>" />

	    Normal

            

<input name="status" type="radio" value="2" <?php if($status ==2){ print "checked=checked";}?> />

Destaque

<input name="status" type="radio" value="3" <?php if($status ==3){ print "checked=checked";}?> />

Destaque Principal </td>

	  </tr>

	<tr>

	  <td colspan="2" align="center"><input name="alterar" type="submit" value="Alterar Produto" /></td>

	</tr>

  </table>

</form>

    

</p>

</div>



</div>



</div>







</body>

</html>

