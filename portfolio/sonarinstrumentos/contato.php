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

				 }else if(!CampoObrigatorio(document.formulario.email)){

				 alert('O campo email deve deve ser preenchido');

									document.formulario.email.focus();

				 return false;

				  }else if(!CampoObrigatorio(document.formulario.tipo)){

				 alert('Selecione o tipo de contato');

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

  <img src="imgs/vn_contato.gif" alt="Contato" width="94" height="27" vspace="3" title="Contato" />

<p>

        <form name="formulario" method="post" action="http://www.refink.com.br/cgi-sys/FormMail.cgi" name="Contato" onsubmit="javascript:return Valida(this)"> 

        <input type="hidden" name="recipient" value="refink@refink.com.br" />

        <input type="hidden" name="subject" value="Contato - Sonar" />

        <input type="hidden" name="redirect" value="http://www.refink.com.br/sonar/contato_obg.php" />

      <p>

        Nome:

        <input type="text" name="nome" />

        <br />

      E-mail:

      <input type="text" name="email" />

      <br />

      Tipo:      

      <select name="tipo" />

        <option value="sugestoes">Sugest&otilde;es</option>

        <option value="duvidas">D&uacute;vidas</option>

        <option value="reclamacoes">Reclama&ccedil;&otilde;es</option>

        <option value="outros">Outros</option>

      </select>



      <br />

      Sexo:

      <input type="radio" name="sexo" value="masc"/> 

      Masculino

      <input type="radio" name="sexo" value="fem" /> 

 Feminino<br />

Mensagem:

<textarea name="obs" rows="7" cols="40"></textarea>

<br />

<br />

<input type="submit" name="btenvia" value="Enviar" />

<input type="reset" name="btlimpa" value="Limpar" />

<br />

      </form>

  </div>

    

  <div id="rodape">

    <?php include("inc/rodape.php");//RODAPÉ?>

  </div>



</div>

</body>

</html>

