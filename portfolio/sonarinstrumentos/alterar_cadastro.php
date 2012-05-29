<?php include("valida_login.php");//VERIFICA SE O USUÁRIO JÁ ESTÁ LOGADO?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><?php

//CONECTAR AO BANCO

include("administracao/conecta.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="style.css" rel="stylesheet" />

<title>Sonar Instrumentos</title>

<style type="text/css">

<!--

.style1 {font-weight: bold}

-->

</style>

</head>



<body>



<div id="container">



    <div id="topo">

	<?php include("inc/topo.php");?>

    </div>

    

    <div id="menu"><?php include("inc/menu.php");?></div>

    

    <div id="menu_vertical">

    <?php include("inc/menu_vertical.php");?>

    </div>

    <div id="conteudo">

    <?php

//EXIBIR ERROS PRA O USUÁRIO

if(!empty($_GET['erro'])){

$erro = $_GET['erro'];

switch (!empty($erro)){

	case $erro == 1:

		print "<strong>Erro: Preencha a senha corretamente</strong>";

		break;

	case $erro == 2:

		print " <strong>Erro: entre com o usuário correto</strong>";

		break;

	case $erro == 3:

		print "<strong> Erro: senha ou usuário incorretos</strong>";

		break;

	case $erro == 4:

		print "<strong> Entre com o usuário e senha</strong>";

		break;

	}

}



?>

<?php 



$usuario = $_GET['usuario'];



$sel_usuario = "SELECT id,usuario,senha,nome,email,endereco,endereco_num,cep,cidade,

		estado,tel_ddd,telefone FROM login WHERE usuario = '$usuario'";

$q_sel_usuario = mysql_query($sel_usuario);



	$r_usuario = mysql_fetch_array($q_sel_usuario);

	$id = $r_usuario[0];

	$usuario = $r_usuario[1];

	$senha = $r_usuario[2];

	$nome = $r_usuario[3];

	$email = $r_usuario[4];

	$endereco = $r_usuario[5];

	$ende_num = $r_usuario[6];

	$cep = $r_usuario[7];

	$cidade = $r_usuario[8];

	$estado = $r_usuario[9];

	$ddd = $r_usuario[10];

	$telefone = $r_usuario[11];



?>



 <form name="cad_login" method="post" action="sql_grava_login.php">

 <input type="hidden" name="id_usuario" value="<?php print $id;?>" />

 <input type="hidden" name="usuario" value="<?php print $usuario;?>" />

	<img src="imgs/vn_alt_cadastro.gif" alt="Alterar Cadastro" width="183" height="35" vspace="2" title="Alterar Cadastro" />

	<p>Nome de usu&aacute;rio: <strong><?php print $usuario;?></strong></p>

	<p>Seu Nome:

      <input name="nome" type="text" id="nome" value="<?php print $nome;?>" />

      *<br />

      E-mail:

      <input name="email" type="text" id="email" value="<?php print $email; ?>" />

*

<br />

Endere&ccedil;o:

<input name="endereco" type="text" id="endereco" maxlength="100" value="<?php print $endereco;?>" />

N.&deg;

<input name="num" type="text" id="num" size="5" maxlength="5" value="<?php print $ende_num;?>">

<br />

CEP:

<input name="cep" type="text" id="cep" maxlength="100" value="<?php print $cep;?>" />

<br />

Cidade:

<input name="cidade" type="text" id="cidade" maxlength="100" value="<?php print $cidade;?>" />

Estado:

<input name="estado" type="text" id="estado" size="5" maxlength="5" value="<?php print $estado;?>" />

<br />

Telefone:

<input name="ddd" type="text" id="ddd" size="3" maxlength="3" value="<?php print $ddd;?>" />

<input name="telefone" type="text" id="telefone" size="10" maxlength="9" value="<?php print $telefone;?>" />

</p>

	<strong>MUDAR SENHA</strong><br class="style1" />

      <br />

	  Preencha caso deseje mudar a sua senha atual <br />

	  Digite a senha Antiga:	

	  <input name="senha" type="password" id="senha" />

	  <br />

	  Senha: 

	  <input name="novasenha" type="password" id="novasenha" />

	  <br />

	  Confirma senha: 

	  <input name="conf_novasenha" type="password" id="conf_novasenha" />

	  <br />

	  <br />

	  <p>* campos n&atilde;o podem ser deixados em branco <br />

	    <br />

	    <br />

	   <input name="bt_upd_login" type="submit" id="bt_upd_login" value="Alterar" />

	   <input type="reset" name="bt_cadlogin" value="limpar" />	

	  </p>

 </form>

    </div>

    

    <div id="rodape">

    <?php include("inc/rodape.php");?>

	</div>



</div>

</body>

</html>

