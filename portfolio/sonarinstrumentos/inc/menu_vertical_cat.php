<?php

//EXIBIÇÃO DO MENU CORRETO CONFORME A CATEGORIA CLICADA

if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==1){

	print '<img src="imgs/cordas.gif" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 1 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=1&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}

if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==2){

	print '<img src="imgs/teclas.gif" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 2 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=2&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}



if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==3){

	print '<img src="imgs/sopro.gif" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 3 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=3&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}



if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==4){

	print '<img src="imgs/perc.png" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 4 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=4&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}



if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==5){

	print '<img src="imgs/audio.gif" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 5 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=5&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}



if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==6){

	print '<img src="imgs/ace.gif" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 6 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=6&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}



if(isset($_GET['cat'])){

	$idcat = $_GET['cat'];

	if($idcat ==7){

	print '<img src="imgs/livros.gif" /><br />';

$sel_subcat = "SELECT id_subcat,nome FROM subcategoria WHERE id_categoria = 7 ORDER BY ordem ASC";

$q_sel_subcat = mysql_query($sel_subcat);



while($r_cat = mysql_fetch_array($q_sel_subcat)){

	$idsubcat = $r_cat[0];

	$item_menu = $r_cat[1];

	//LINK DOS PRODUTOS

	print '&nbsp;- <a href="exibe_produtos_cat.php?cat=7&subcat='.$idsubcat.'" />';

	//NOME DA SUBCATEGORIA

	print $item_menu."<br /></a>";

	}

}

}

?>