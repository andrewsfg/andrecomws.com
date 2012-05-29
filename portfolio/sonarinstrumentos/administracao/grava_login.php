<?php



ob_start();



//INSERINDO USUÁRIO



//VALIDANDO

//OBTENDO OS DADOS ENVIADOS

if(isset($_POST['bt_cadlogin'])){

		$usuario = $_POST['usuario'];

		$senha = $_POST['senha'];

		$conf_senha = $_POST['conf_senha'];

		$perm = $_POST['perm'];

		$status = $_POST['status'];

	if(isset($usuario) && !empty($usuario) && strlen($usuario) <=10){

		if(isset($senha) && !empty($senha) && strlen($senha) <= 12 && ($senha) == ($conf_senha)){

	

//GRAVAR DADOS NO BANCO

		include("conecta.php");

	 	$s_log = "INSERT INTO login(usuario,senha,perm,status) VALUES

		('$usuario','$senha','$perm','$status')";

		$q_log = mysql_query($s_log);

		session_start();

    	$_SESSION["usuario"] = $usuario;

    	$_SESSION["senha_usuario"] = $senha;

		header("location:adm.php?frase=5");

		

}

}

}



//ATUALIZANDO LOGIN



//SE CLICOU NO BOTÃO DE ALTERAR LOGIN

if(isset($_POST['bt_updlogin'])){



//OBTENDO VALORES

	$id = $_POST['id'];

	$senha_antiga = $_POST['senha'];

	$nova_senha = $_POST['novasenha'];

	$conf_senha = $_POST['conf_novasenha'];

	$perm = $_POST['perm'];

	$status = $_POST['status'];

	

	if($nova_senha == $conf_senha){

include("conecta.php");



//COMANDO SQL PARA CONFERIR SENHA CORRETA

$sel_login = "SELECT senha FROM login WHERE id = $id AND senha = '$senha_antiga'";

$q_sel_login = mysql_query($sel_login);

$r_login = mysql_num_rows($q_sel_login);





//SE A SENHA DO BANCO BATER COM A SENHA ENVIADA INSERIR NOVA SENHA

if($r_login >0){



//ATUALIZAR SENHA NO BD



$upd_senha = "UPDATE login

			  SET senha = '$nova_senha',

			  perm = $perm,

			  status = $status 

			  WHERE id = $id";



$q_upd_senha = mysql_query($upd_senha);



//EXECUTADO A QUERY CORRETAMENTE, REDIRECIONA PARA EXIBIÇÃO DOS USUÁRIOS 

header("location:adm.php?pag=6.php?frase=1");





}



}else{

print "erro na confirmação da senha";

}





}

?>

