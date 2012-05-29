<?php

include("../conecta.php");



//include que mostra as categorias

$sel_login = "SELECT id,usuario,perm,status FROM login ";

$q_sel_login = mysql_query($sel_login);



while($r_sel_login = mysql_fetch_array($q_sel_login)){

print "Id: ".$r_sel_login[0]."<br />";

print "Nome de usuário: ".$r_sel_login[1]."<br />";

print "Permissão: ".$r_sel_login[2]."<br /><br />";



}

print "</select>";

?>

