<?php

ob_start();



session_start();

if (isset($_SESSION["usuario"]) && isset($_SESSION["senha"])) {

    $usuario = $_SESSION["usuario"];

    $senha = $_SESSION["senha"];

    $perm = $_SESSION["perm"];

	

}else{

echo "Voc� n�o efetuou o login.";

header("location:logar.php");

exit();

} 



?>