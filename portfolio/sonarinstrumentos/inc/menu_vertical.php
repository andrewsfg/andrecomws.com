<img src="imgs/cordas.gif" /><br />

<?php

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

?><img src="imgs/teclas.gif" /><br /><?php



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

?><img src="imgs/sopro.gif" /><br /><?php



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

?><img src="imgs/perc.png" /><br /><?php



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

?><img src="imgs/audio.gif" /><br />

<?php

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

?><img src="imgs/ace.gif" /><br />

<?php

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

?><img src="imgs/livros.gif" /><br /><?php

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

?>