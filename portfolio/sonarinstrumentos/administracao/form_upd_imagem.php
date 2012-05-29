<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Atualizar Imagem</title>

</head>



<body><form action="sql_upd_imagem.php" method="post" enctype="multipart/form-data" name="upd_imagem" id="upd_imagem">

<input type="hidden" id="id" name="id" value="<?php print $_GET['id']; ?>" />

<table width="500" border="1">

  <tr>

    <th colspan="2">Inser&ccedil;&atilde;o da imagem: </th>

  </tr>

  <tr>

    <td>Imagem ampliada: </td>

    <td><input name="img_ampli" type="file" id="img_ampli" /></td>

  </tr>

  <tr>

    <td width="113">Imagem pequena: </td>

    <td width="371"><input name="img_peq" type="file" id="img_peq" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><input name="upd_imagem" type="submit" id="upd_imagem" value="Enviar imagens" /></td>

    <td>&nbsp;</td>

  </tr>

</table></form>

<p>&nbsp;</p>

</body>

</html>

