<?php include("valida_login.php");//VERIFICA SE O USU�RIO J� EST� LOGADO?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><?php

//CONECTAR AO BANCO

include("administracao/conecta.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="style.css" rel="stylesheet" />

<title>Sonar Instrumentos</title>

</head>



<body>



<div id="container">



    <div id="topo">

	<?php include("inc/topo.php");//TOPO?>

    </div>

    

    <div id="menu"><?php include("inc/menu.php");//MENU?></div>

    

    <div id="menu_vertical">

    <?php include("inc/menu_vertical.php");//MENU TODAS CATEGORIAS?>

    </div>

    <div id="conteudo">

   

<?php

//MOSTRANDO NOME DO USU�RIO E LINK PARA DESLOGAR

	print "bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar.php">Deslogar</a>';

	



//EXIBIR ERROS PARA O USU�RIO

if(!empty($_GET['erro'])){

$erro = $_GET['erro'];

switch (!empty($erro)){

	case $erro == 1:

		print "<strong>Erro: Preencha a senha corretamente</strong>";

		break;

	case $erro == 2:

		print " <strong>Erro: entre com o usu�rio correto</strong>";

		break;

	case $erro == 3:

		print "<strong> Erro: senha ou usu�rio incorretos</strong>";

		break;

	case $erro == 4:

		print "<p><strong> MENSAGEM: VOC� N�O TEM PEDIDOS </strong></p>";

		break;

	}

}

	if($perm == 0){

		print '<p><img src="imgs/adm_cliente_logado.gif" /><br />';

		print '<p><a href="administracao/index.php"><strong>PAINEL DE ADMINISTRA��O</a></p></strong>';



	}else{

		print '<p><img src="imgs/adm_cliente_logado.gif" /><br />';

		print '<strong><p><a href="pedido_lista.php">HIST�RICO DE PEDIDOS</a></p>';

		print "<p>ALTERAR DADOS PESSOAIS</p></strong>";



	}

	?>



    </div>

    

    <div id="rodape">

    <?php include("inc/rodape.php");//RODAP�?>

	</div>



</div>

</body>

</html>

