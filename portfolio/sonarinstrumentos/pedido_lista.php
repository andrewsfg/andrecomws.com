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

    <div id="conteudo"><h3>PEDIDO:</h3>

   <?php

//EXIBIR ERROS PARA O USUÁRIO



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



	function data_formatada($dt){

	

		list($a, $m, $d) = explode ("-", $dt);

		

		$dn = $d."/".$m."/".$a;

		

		return $dn;

	

	}



	include ("administracao/conecta.php");



	if (!isset ($_SESSION['usuario'])){

	

		header("location:logar.php");

	

	}

    $usuario = $_SESSION['usuario'];

	

	$s_exibe = "SELECT pedido_id, pedido_data, pedido_valor FROM pedido WHERE usuario = '$usuario'";

	$q_exibe = mysql_query ($s_exibe);

	$r_exibe = mysql_num_rows($q_exibe);

	if($r_exibe ==0){

		header("location:logado.php?erro=4");

	}else{

	}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

</head>



<body>

<table width="400" border="0">

  <tr>

    <td colspan="3"><strong>Cliente:</strong> <?php print $usuario; ?></td>

  </tr>

  <tr>

    <td><strong>Pedido</strong></td>

    <td><strong>Data</strong></td>

    <td><strong>Valor Total</strong> </td>

  </tr>

  <?php 

  

  	while ($r_exibe = mysql_fetch_array($q_exibe)){

	

		$data = data_formatada($r_exibe[1]);

	

  		print 

			  "<tr>

				<td><a href=\"mostra_pedido.php?pedidoid=".$r_exibe[0]."\">".$r_exibe[0]."</a></td>

				<td>".$data."</td>

				<td>".number_format($r_exibe[2], 2, ",", ".")."</td>

			  </tr>";

			  

	}

  

  ?>

</table>

</body>

</html>



    

    <div id="rodape">

    <?php include("inc/rodape.php");//RODAPÉ?>

	</div>



</div>

</body>

</html>

