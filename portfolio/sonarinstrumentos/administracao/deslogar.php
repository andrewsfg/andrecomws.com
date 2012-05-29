<?php

session_start();//INICIA A SESSION

$_SESSION = array();

session_destroy();//DESTROY SESSIION

header("location:logar.php");//REDIRECIONA PARA SE LOGAR NOVAMENTE

?>

