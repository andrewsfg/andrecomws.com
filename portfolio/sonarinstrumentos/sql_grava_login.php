<?php



ob_start();



//INSERINDO USUÁRIO



//VALIDANDO

//OBTENDO OS DADOS ENVIADOS

if(isset($_POST['bt_cadlogin'])){



		$usuario = $_POST['usuario'];

		$senha = $_POST['senha'];

		$conf_senha = $_POST['conf_senha'];

		$perm = 1;

		$status = 0;

		$nome = $_POST['nome'];

		$email = $_POST['email'];

		$endereco = $_POST['endereco'];

		$numero = $_POST['num'];

		$cep = $_POST['cep'];

		$cidade = $_POST['cidade'];

		$estado = $_POST['estado'];

		$tel_ddd = $_POST['ddd'];

		$telefone = $_POST['telefone'];

		

		

	if(isset($usuario) && !empty($usuario) && strlen($usuario) <=10){

		if(isset($senha) && !empty($senha) && strlen($senha) <= 12 && ($senha) == ($conf_senha)){

	

//GRAVAR DADOS NO BANCO

		include("administracao/conecta.php");

	 	$s_log = "INSERT INTO login(usuario,senha,perm,status,nome,email,endereco,endereco_num,cep,cidade,

		estado,tel_ddd,telefone) 

		VALUES ('$usuario','$senha','$perm','$status','$nome','$email','$endereco',

		'$numero','$cep','$cidade','$estado','$tel_ddd','$telefone')";

		$q_log = mysql_query($s_log);

		print $s_log;

		session_start();

    	$_SESSION["usuario"] = $usuario;

    	$_SESSION["senha_usuario"] = $senha;

		header("location:logar.php?erro=5");

		

}

}

}



//ATUALIZANDO LOGIN



//SE CLICOU NO BOTÃO DE ALTERAR LOGIN

if(isset($_POST['bt_upd_login'])){

	//SE O ID FOI ENVIADO PROSSIGA

	if(isset($_POST['id_usuario'])){

	include("administracao/conecta.php");

		//OBTENDO O ID DO USUÁRIO

		$id = $_POST['id_usuario'];



//OBTENDO VALORES

			$usuario = $_POST['usuario'];

			$perm = 1;

			$status = 0;

			$nome = $_POST['nome'];

			$email = $_POST['email'];

			$endereco = $_POST['endereco'];

			$numero = $_POST['num'];

			$cep = $_POST['cep'];

			$cidade = $_POST['cidade'];

			$estado = $_POST['estado'];

			$tel_ddd = $_POST['ddd'];

			$telefone = $_POST['telefone'];

			

			//ATUALIZANDO DADOS



$upd_dados = "UPDATE login

			  SET nome = '$nome',

			  email = '$telefone',

			  endereco = '$endereco',

			  endereco_num = '$numero',

			  cep = '$cep',

			  cidade = '$cidade',

			  estado = '$estado',

			  tel_ddd = '$tel_ddd',

			  telefone = '$telefone'

			  

			  WHERE id = $id";

			  

$q_upd_dados = mysql_query($upd_dados);

			//SE CLICOU PARA ALTERAR A SENHA PROSSIGA

			

if(isset($_POST['senha']) && isset($_POST['novasenha'])

&& isset($_POST['conf_novasenha'])){

	$senha_antiga = $_POST['senha'];

	$nova_senha = $_POST['novasenha'];

	$conf_senha = $_POST['conf_novasenha'];

	

	if($nova_senha == $conf_senha){



//COMANDO SQL PARA CONFERIR SENHA CORRETA

$sel_login = "SELECT senha FROM login WHERE id = '$id' AND senha = '$senha_antiga'";

$q_sel_login = mysql_query($sel_login);

$r_login = mysql_num_rows($q_sel_login);



//SE A SENHA DO BANCO BATER COM A SENHA ENVIADA INSERIR NOVA SENHA

if($r_login >0){



//ATUALIZAR SENHA NO BD



$upd_senha = "UPDATE login

			  SET senha = '$nova_senha',

			   

			  WHERE id = $id";



$q_upd_senha = mysql_query($upd_senha);

header("location:logado.php?mensagem=2");

}

header("location:logado.php?mensagem=1");

}else{

print "erro na confirmação da senha";

}







}



}



}







?>

