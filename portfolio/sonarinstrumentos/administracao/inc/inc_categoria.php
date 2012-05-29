<?php

include("conecta.php");



//include que mostra as categorias

$sel_categoria = "SELECT id_categoria,id_categoria_pai,nome FROM categoria ";

$q_sel_categoria = mysql_query($sel_categoria);



print '<select name="categoria">';

while($r_sel_categoria = mysql_fetch_array($q_sel_categoria)){

print '<option name="'.$r_sel_categoria[0].'">'.$r_sel_categoria[1]." - ".$r_sel_categoria[2].'</option>';



}

print "</select>";

?>

