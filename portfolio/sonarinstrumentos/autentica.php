<?php



ob_start();



if(isset($_POST['bt_login'])){

	$usuario = $_POST['usuario'];

	$senha = $_POST['senha'];

	// se clicou em bt_login verifique se usuario é menor ou igual a 10

	if (!empty($usuario) && strlen($usuario) <= 10){

	// verifica se a senha está vazia e se é menor que 6 caractees

		if(!empty($senha) && strlen($senha) >= 3){

		include("administracao/conecta.php"); //conecta

		//selecione a permissão do usuário caso usuario e senha estejam corretos

		$s_log = "SELECT usuario,senha,perm FROM login WHERE usuario = '$usuario' 

		AND senha = '$senha' AND status = 0";

		$q_log = mysql_query($s_log);

		while ($r_log=mysql_fetch_array($q_log)){

			session_start();

			$_SESSION["usuario"] = $r_log['usuario'];

			$_SESSION["senha"] = $r_log['senha'];

			$_SESSION["perm"] = $r_log['perm'];

			$perm = $r_log['perm'];

		}

		if (mysql_num_rows($q_log) == 1){

			//GRAVAR LOG

				$grava_log = "INSERT INTO grava_log VALUES ('".$usuario."', '".date("Y-m-d H:i:s")."', '".$_SERVER['REMOTE_ADDR']."',".$perm.")";

				mysql_query ($grava_log);

			}

		if(mysql_num_rows($q_log) == 1){

				header("location:logado.php");

				}else{

						header("location:logar.php?erro=3");

						}

						}else {

		header("location:logar.php?erro=1");

		}

		}else{

		header("location:logar.php?erro=4");

		}

		}else{

		header("location:logar.php?erro=3");

		}

?>

