<?php

//DESLOGAR USU�RIO

session_start();

$_SESSION = array();

session_destroy();//ELIMINAR SESS�O

header("location:index.php");//REDIRECIONA PARA LOGAR-SE NOVAMENTE

?>

