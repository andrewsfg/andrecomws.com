

<?php

ob_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Categoria</title>

</head>



<body>

<form action="ins_cat.php" name="teste" method="post" >

<select name="categoria" onChange="this.form.submit();">

<option value="1">nenhuma</option>

<?php

include("conecta.php");



$s_cat = "SELECT id_categoria, nome, ordem FROM categoria WHERE id_categoria_pai = 1";

$q_cat = mysql_query($s_cat);



	while ($r_cat = mysql_fetch_array($q_cat)){

	    print "<option value='".$r_cat[0]."'>".$r_cat[1]."</option>";

			}

?>

</select>

<?php

if(isset($_GET['subcat'])){

 

$cat = $_GET['subcat']; 

 print' 

        <select name="subcategoria" onChange="this.form.submit();">

        <option value="'.$cat.'">nenhuma</option>';

$s_subcat = "SELECT id_categoria, nome, ordem FROM categoria WHERE id_categoria_pai = $cat";

$q_subcat = mysql_query($s_subcat);

 while ($r_subcat = mysql_fetch_array($q_subcat)){

	print "<option value='".$r_subcat[0]."'>".$r_subcat[1]."</option>";

			} 

  print "</select>";

  

}

?>

<br />

<input type="text" name="rotulo" />

<br />

<input type="text" name="ordem" size="3" />

<br />

<input type="submit" value="cadastrar" name="cad" />



</form>

</body>

</html>

