<?php
//FORM CONTACT BY ANDREWS FG - WWW.ANDRECOMWS.COM
	if(isset($_POST["bt-send"])){
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$telefone = "(" . $_POST["ddd"] . ") " . $_POST["telefone"] ;
		$pais = $_POST["pais"];
		$assunto = $_POST["assunto"];
		$mensagem = nl2br($_POST["mensagem"]);	
		
		$from    = "falecom@andrecomws.com";
		$to      = "falecom@andrecomws.com";
		$subject = "Formulário de Contato";
	
		$headers  = "From: Site <" . $from . ">\r\n";
		$headers .= "Return-Path: <" . $from . ">\r\n";
		$headers .= "Reply-to: <" . $from . ">\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		
		$body = "<font face='Arial'><h3>Formulário de Contato - NWhope.net</h3></font>";
		$body .= "<font face='Arial' size='2'><b>O usuário abaixo preencheu o formulário com as seguintes informações:</b><br /><br />";
	
		$body .= "<b>Nome: </b>" . $nome . "<br />";
		$body .= "<b>E-mail: </b>" . $email . "<br />";
		$body .= "<b>Telefone: </b>" . $telefone . "<br />";
		$body .= "<b>País: </b>" . $pais . "<br />";
		$body .= "<b>Assunto: </b>" . $assunto . "<br />";
		$body .= "<b>Mensagem: </b>" . $mensagem . "</font>";

		header("location:sucesso.html");
    @mail($to, $subject, $body, $headers);
	}else{
		header("location:contato.html");
	}
?>