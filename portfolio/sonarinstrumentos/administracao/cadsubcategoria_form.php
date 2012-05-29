<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

</head>



<body>

<form id="ins_categoria" name="ins_categoria" method="post" action="sql_subcategoria.php">

  <table width="200" border="1">

    <tr>

      <th colspan="2">Sub Categoria</th>

    </tr>

		<?php 

		include("conecta.php");

		//pegar valores de subcategorias

		$sel_subcategoria = "SELECT id_categoria_pai FROM categoria";

		$q_subcategoria = mysql_query($sel_subcategoria);

		$categoria_pai = mysql_result ($q_subcategoria, 0, "id_categoria_pai");

		

		if(isset($_GET['id'])){

		$categoria = $_GET['id'];

			  }else{

		$categoria = 1;

		}



		

		?>

		<tr>

      <td>Nome:</td>

      <td>

	  <input type="hidden" name="categoriapai" value="<?php

	  print $categoria; ?>"/>

        <input type="text" name="nome" /></td>

    </tr>

    <tr>

      <td>Link:</td>

      <td><input name="link" type="text" id="link" /></td>

    </tr>

    <tr>

      <td>Ordenamento:</td>

      <td><input name="ordem" type="text" id="ordem" /></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><input name="bt_cadcategoria" type="submit" id="bt_cadcategoria" value="Gravar" />

      <input name="limpar_categoria" type="reset" id="limpar_categoria" value="Limpar" /></td>

    </tr>

  </table>

  <p>&nbsp;</p>

</form>

</body>

</html>

