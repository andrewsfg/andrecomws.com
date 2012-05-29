<?php



ob_start();



if(isset($_POST['bt_login'])){

	$usuario = $_POST['usuario'];

	$senha = $_POST['senha'];

	// SE CLICOU EM BT_LOGIN VERIFIQUE SE USUÁRIO É MENOR OU IGUAL A 10

	if (!empty($usuario) && strlen($usuario) <= 10){

	// VERIFICA SE A SENHA ESTÁ VAZIO E SE É MENOR QUE 3 CARACTERES

		if(!empty($senha) && strlen($senha) >= 3){

		include("conecta.php"); //CONECTAR AO BANCO DE DADOS

		//SELECIONE A PERMISSÃO CASO USUÁRIO E SENHA ESTEJAM CORRETOS

		$s_log = "SELECT usuario,senha,perm FROM login WHERE usuario = '$usuario' 

		AND senha = '$senha' AND status = 0";

		$q_log = mysql_query($s_log);//EXECUTAR BANCO

		while ($r_log=mysql_fetch_array($q_log)){

		//GUARDA USUÁRIO E SENHA NUMA SESSION

			session_start();

			$_SESSION["usuario"] = $r_log['usuario'];

			$_SESSION["senha"] = $r_log['senha'];

			$_SESSION["perm"] = $r_log['perm'];

			$perm = $r_log['perm'];

		}

		//CASO LOGADO COM SUCESSO GRAVAR LOG DE ACESSO

		if (mysql_num_rows($q_log) == 1){

			//QUERY PARA INSERIR LOG

				$grava_log = "INSERT INTO grava_log VALUES ('".$usuario."', '".date("Y-m-d H:i:s")."', '".$_SERVER['REMOTE_ADDR']."',".$perm.")";

				print $grava_log;

				mysql_query ($grava_log);

			}

			//REDIRECIONAR PARA INDEX

		header("location:index.php");

		//CASO DE ERRO REDIRECIONE E EXIBA MENSAGEM

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

