<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

</head>



<body>

<form id="ins_categoria" name="ins_categoria" method="post" action="sql_categoria_upd.php">

  <table width="200" border="1">

    <tr>

      <th colspan="2">Categoria</th>

    </tr>

		<?php 

		include("conecta.php");

		//pegar valores da categoria a ser atualizada

		

		$id_categoria = $_GET['id'];

		$sel_categoria = "SELECT nome,ordem FROM categoria 

		WHERE id_categoria = $id_categoria";

		$q_categoria = mysql_query($sel_categoria);

		while($r_categoria = mysql_fetch_array($q_categoria)){

			$nome = $r_categoria[0];

			$ordem = $r_categoria[1];

}

		?>

		<tr>

      <td>Nome:</td>

      <td>

	  <input type="hidden" name="id_categoria" value="<?php

	  print $id_categoria; ?>"/>

        <input type="text" name="nome" value="<?php

	  print $nome; ?>" /></td>

    </tr>

    <tr>

      <td>Ordenamento:</td>

      <td><input name="ordem" type="text" id="ordem" value="<?php

	  print $ordem; ?>" /></td>

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

