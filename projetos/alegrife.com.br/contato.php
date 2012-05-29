
<?php
  if(isset($_POST['send'])) {
    $nome = $_POST['nome'];
    $email   = $_POST['email'];
    $men     = nl2br($_POST['mensagem']);


    $from    = "alegrife@alegrife.com.br";
    $to      = "alegrife@alegrife.com.br";
    $subject = "E-mail enviado pelo site Alegrife.";

    $headers  = "From: Site <" . $from . ">\r\n";
    $headers .= "Return-Path: <" . $from . ">\r\n";
    $headers .= "Reply-to: <" . $from . ">\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    $body  = "<b>E-mail abaixo foi enviado pelo site.</b><br /><br />";

    $body .= "<b>Nome:</b> $nome<br />";
    $body .= "<b>E-mail:</b> $email<br />";
    $body .= "<b>Mensagem:</b> <br />$men";

    @mail($to, $subject, $body, $headers);
	
    echo "
	<script>
		document.location.href = 'contato.php?sucess=true';
	</script>
	";
	
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alegrife - A Grife da Alegria - Contato</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
<!-- start campanha imasters -->
<script src="http://imasters.uol.com.br/crossbrowser/fonte.js" type="text/javascript"></script>
<link rel="shortcut icon" href="favicon.ico" >
<meta name="editoria" content="Alegrife"/>
<meta name="description" content="A Alegrife precisava ajudar a mamãe a não se sentir limitada entre o alto preço da boa qualidade e o baixo preço da pouca qualidade."/>
<meta name="keywords" content="Alegrife, Coleções, Roupas Infantis, Charme, Mãe, Desfiles, Crianças, Roupas, Moda Infantil" />
<!-- end campanha imasters -->
<script language="javascript">
  function checkForm(form){
  	if(form.nome.value == ""){
		alert('O campo Nome é obrigatório');
		form.nome.focus();
		return false;
	}
  	if( form.email.value == ""){
		alert('O campo E-mail deve ser preenchido');
		form.email.focus();
		return false;
    } 
	//VERIFICA E-MAIL
	var obj = eval("document.forms['contato'].email");
	var txt = obj.value;
	if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
	{
		alert('E-mail inválido');
		obj.focus();
		return false;
	 }	
  	if(form.mensagem.value == ""){
		alert('O campo Mensagem deve ser preenchido');
		form.mensagem.focus();
		return false;
	}
	if(form.mensagem.value.length > 350){
		alert('Mensagem excede limite de caracteres');
		form.mensagem.focus();
		return false;
	} else { //esse else so foi colocado para evitar que o form desse o submit
		return true;
	} 
		return true;
 }

 
</script>

</head>

<body>

<?php include("inc/top.php"); ?>

<div id="container">
	<div id="content">
    	<div class="middle-section">
        
        
          <h2 title="Contato">Contato</h2>
          <h3>Preencha o formulário abaixo</h3>
          <?php 
		  if(isset($_GET['sucess']) and $_GET['sucess'] == 'true'){{
				print "<p>Seu e-mail foi enviado com sucesso. Obrigado.</p>";	
		  
		  }
		  }else{
		  		print '<form name="contact" method="post" action="contato.php" id="contact" onsubmit="javascript: return checkForm(this);">
			  			   	<fieldset>
							   <legend>Formulário</legend>
							   <label for="nome">Nome:</label>
							   <input name="nome" id="nome" size="50" />
							  <br />
							  <label for="email">E-mail:</label>
							  <input size="50" name="email" />
							  <label for="mensagem"><br />
							  Mensagem:</label>
							  <textarea name="mensagem" cols="38" rows="6" id="mensagem"></textarea>
							  <br />
							  <input type="submit" name="send" id="send" value="Enviar" />   
						  </form>';
		  
		  }
		  ?>
          
      </div>
</div>
</div>
   <?php include("inc/footer.php");?>
   </div>

</body>
</html>
