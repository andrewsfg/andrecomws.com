<?php

//DESLOGAR USUÁRIO

session_start();

$_SESSION = array();

session_destroy();//ELIMINAR SESSÃO

header("location:logar.php");//REDIRECIONA PARA LOGAR-SE NOVAMENTE

?>

