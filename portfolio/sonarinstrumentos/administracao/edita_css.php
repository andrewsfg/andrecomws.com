<?php include("valida_login.php");//VALIDAR LOGIN?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" />

<title>..: Sonar Instrumentos - Administra&ccedil;&atilde;o</title>

</head>

<body>



<div id="container">



<div id="topoadm"><a href="index.php"><img src="../imgs/topo.jpg" alt="Painel de Administra&ccedil;&atilde;o" border="0" title="Painel de Administração" /></a></div>





<div id="meioadm">

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - PRODUTOS</h1>

</div>



<div id="contadm"><?php

//VALIDANDO O USUÁRIO

	print "bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar.php">Deslogar</a>';

	

	//SE NÃO FOR ADMINISTRADOR, REDIRECIONAR

	if($_SESSION["perm"] <> 0){

	header("location:../index.php");

	}

?>

</div><div id="paineladm">

  <p><?php

include("conecta.php");

?>

  </p>

  <?php include("menu.php");

	  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>CSS alterado com sucesso.</strong></p>';

			  		}elseif($frase==2){

					print '<p>Aviso: <strong>CSS restaurado com sucesso.</strong></p>';

				}else{

				}

				}

	 ?>

  </p><span class="titadm"><img src="../imgs/adm_painel_atualiza.gif" width="16" height="16" hspace="4" />Alterar CSS:  </span>

  <br />

  <br />

  <form name="alteracss" action="altera_css.php" method="post">

      <table border="0" align="center" cellpadding="1" cellspacing="1" width="100%">

			  <tr align="center">

				  <td><input type="submit" name="subA" value="Confirmar alterações" /></td>

					<td><input type="submit" name="subB" value="Restaurar css original" /></td>

				</tr>

        <tr>

				  

          <td align="center" colspan="2">

       <?php

//CAMINHO DO CSS		 

$arquivo = "../style.css";



$abre = fopen($arquivo, "r");

$ler = fread($abre, filesize($arquivo));



print'<textarea name="editor" rows="20" cols="70">'.$ler.'</textarea><br />';





    ?>          </td>

				</tr>		

				<tr>

				  <td align="center" colspan="2">&nbsp;			    </td>

			  </tr>

      </table>

    </form>

  </p>

  </a></div>



</div>



</div>







</body>

</html>

