<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script language="JavaScript" type="text/javascript" src="js/funcoes.js"></script>

<script language="JavaScript" type="text/javascript">



<!--

function Valida(){

         if(!CampoObrigatorio(document.formulario.nome)){

				 alert('O campo nome está em branco e é obrigatório');

				 					document.formulario.nome.focus();

				 return false;	 

				 }else if(!NumeroObrigatorio(document.formulario.idade)){

				 alert('O campo deve ser um número e deve ser preenchido');

				 					document.formulario.idade.focus();

				 return false;

				 }else if(!CampoObrigatorio(document.formulario.email)){

				 alert('O campo email deve deve ser preenchido');

				 					document.formulario.email.focus();

				 return false;

				  }else if(!CampoObrigatorio(document.formulario.tipo)){

				 alert('Selecione o tipo de contato');

				 return false;

			   }else if(!ValidaCheck('document.formulario.chkint_',2)){

				 alert('Dê sua opinião sobre o que achou do Portifolio');

				 return false;

				  }else if(!ValidaOption(document.formulario.sexo)){

				 alert('Preencha o sexo');

				 return false;

				 }else if(!CampoObrigatorio(document.formulario.obs)){

				 alert('Preencha a mensagem');

				 								 	document.formulario.obs.focus();

				 return false;

				 }else{

				 return true;

				 }

			}

			

//-->

</script>

<?php

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

    <?php include("inc/menu_vertical.php");//MENU - TODAS CATEGORIAS?>

    </div>

    

    <div id="conteudo">

      <p><span class="titadm">Contato</span></p>

        <form name="formulario" method="post" action="http://www.refink.com.br/cgi-sys/FormMail.cgi" name="Contato" onsubmit="javascript:return Valida(this)"> 

        <input type="hidden" name="recipient" value="refink@refink.com.br" />

        <input type="hidden" name="subject" value="Contato - Sonar" />

        <input type="hidden" name="redirect" value="http://www.refink.com.br/sonar/contato_obg.php" />

      <table>

	<tr>

		<td>Nome:</td>

		<td><input type="text" name="nome" /></td>

	</tr>

	<tr>

			<td>Idade:</td>

			<td><input type="text" name="idade" /></td>

	</tr>

	<tr>

		<td>E-mail:</td>

		<td><input type="text" name="email" /></td>

	</tr>

	<tr>

		<td>Tipo:</td>

		<td>

		<select name="tipo" />

		<option>Sugestões</option>

		<option value="duvidas">Dúvidas</option>

		<option value="outros">Outros</option>		</td>

	</tr>

	<tr>

		<td>O que achou da Sonar Instrumentos:</td>

		<td>

		<input type="checkbox" name="chkint_0" value="0" />Bom

		<input type="checkbox" name="chkint_1" value="1" />Regular

		<input type="checkbox" name="chkint_2" value="2" />Ruim		</td>

	</tr>

	<tr>

	<td>Sexo:</td>

	<td>Masculino <input type="radio" name="sexo" value="masc"/>

		Feminino<input type="radio" name="sexo" value="fem" /></td>

	</tr>

	

	<tr>

		<td>Mensagem:</td>

		<td><textarea name="obs" rows="7" cols="40"></textarea></td>

	</tr>

	<tr>

		<td><input type="submit" name="btenvia" value="Enviar" /></td>

		<td><input type="reset" name="btlimpa" value="Limpar" /></td>

	</form>

	</tr>

  </table> 

  </div>

    

  <div id="rodape">

    <?php include("inc/rodape.php");//RODAPÉ?>

	</div>



</div>

</body>

</html>

