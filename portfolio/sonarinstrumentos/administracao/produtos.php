



<form action="cadastra.php" method="post" enctype="multipart/form-data">

  <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%">

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

	  <th colspan="2">Categoria:</th>

	</tr>

	<tr>

	  <td colspan="2" align="center">

<?php 



// include com as categorias cadastradas

include("inc/inc_categoria.php");

?>

	  </td>

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

	  <th colspan="2"><strong>Imagens:</strong></th>

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

	  <td><input name="status" type="radio" value="0" />Normal</td>

	  <td><input name="status" type="radio" value="1" />Destaque</td>

	</tr>

	<tr>

	  <td colspan="2" align="center"><input name="inserir" type="submit" value="Gravar" /></td>

	</tr>

  </table>

</form>







