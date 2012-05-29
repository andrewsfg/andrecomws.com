<?php

//FORMULÁRIO DE ENVIO POR ANDREWS F.G

  error_reporting(0);



  if(isset($_POST['bt-envia'])) {

    if(substr_count($_POST['email'], '@')==1) {

      $to            = "refink@refink.com.br";

      $from          = "refink@refink.com.br";

      $from_name     = "Econt Consultoria";

      $bcc           = "";



      $subject = "Econt Consultoria";



          $body = "";

          $body .= "<font face='arial' size='2'>Econt Consultoria" . "<br /><br />";

          $body .= "O visitante abaixo preencheu os dados do formul&aacute;rio de Contato da Econt Consultoria com

          as seguintes informa&ccedil;&otilde;es<br /><br >";



      $body .= "<b>Nome:</b> "       . $_POST['nome']        . "<br />";

      $body .= "<b>Data de Nascimento:</b> " . $_POST['nascimento1'] . $_POST['nascimento2'] . $_POST['nascimento3'] . "<br />";

      $body .= "<b>Sexo:</b> "   . $_POST['sexo']    . "<br />";

      $body .= "<b>Estado Civil:</b> "     . $_POST['estadocivil']       . "<br />";

      $body .= "<b>Curso:</b> "     . $_POST['curso']      . "<br />";

      $body .= "<b>Turno:</b> "     . $_POST['turno']      . "<br />";

      $body .= "<b>Periódo:</b> "     . $_POST['periodo']      . "<br />";

      $body .= "<b>Endereço:</b> "     . $_POST['endereco']      . "<br />";

      $body .= "<b>Cidade:</b> "     . $_POST['cidade']      . "<br />";

      $body .= "<b>E-mail:</b> "     . $_POST['email']      . "<br />";

      $body .= "<b>Telefone:</b> "     . $_POST['telefone']      . "<br />";

      $body .= "<b>Celular:</b> "     . $_POST['celular']      . "<br />";

      $body .= "<b>Mensagem:</b> <br />" . $_POST['mensagem']    . "<br /></font>";



      $headers  = "From: " . $from_name . " <" . $from . ">\r\n";

      $headers .= $bcc;

      $headers .= "Return-Path: <" . $from . ">\r\n";

      $headers .= "Reply-to: <" . $_POST['email'] . ">\r\n";

      $headers .= "Content-type: text/html; charset=utf-8\r\n";



      if(substr_count($_POST['email'], '@') < 2) {

        @mail($to, $subject, $body, $headers);



        $to = $_POST['email'];



        $subject = "Confirmação de envio: Econt Consultoria - Contato";



        $headers  = "From: " . $from_name . " <" . $from . ">\r\n";

        $headers .= $bcc;

        $headers .= "Return-Path: <" . $from . ">\r\n";

        $headers .= "Reply-to: <" . $from . ">\r\n";

        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";



                $body  = "Econt Consultoria<br />";

        $body  .= "<font face='arial' size='2'><p>Sua informações foram enviadas com sucesso para a Econt Consultoria</p>";

        $body .= "<p>Aguarde que em breve retornaremos o contato.</p>";

        $body .= "<b>Econt Consultoria</b></font>";





        @mail($to, $subject, $body, $headers);

      }

      header('Location: form_sucesso.html');

      exit;

    }



    exit;

  }

  else {

    exit;

  }

?>