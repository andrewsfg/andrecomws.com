<?php

//FORMULÁRIO DE ENVIO POR ANDREWS F.G

  error_reporting(0);



  if(isset($_POST['bt-envia-news'])) {

    if(substr_count($_POST['email'], '@')==1) {

      $to            = "econtconsultoria@gmail.com";

      $from          = "econtconsultoria@gmail.com";

      $from_name     = "Econt Consultoria - Newsletter";

      $bcc           = "";



      $subject = "Econt Consultoria - Newsletter";



          $body = "";

          $body .= "<font face='arial' size='2'>Econt Consultoria" . "<br /><br />";

          $body .= "O visitante abaixo se cadastrou na newsletter.<br /><br >";



      $body .= "<b>Nome:</b> "       . $_POST['email']        . "<br />";

      $headers  = "From: " . $from_name . " <" . $from . ">\r\n";

      $headers .= $bcc;

      $headers .= "Return-Path: <" . $from . ">\r\n";

      $headers .= "Reply-to: <" . $_POST['email'] . ">\r\n";

      $headers .= "Content-type: text/html; charset=utf-8\r\n";



      if(substr_count($_POST['email'], '@') < 2) {

        @mail($to, $subject, $body, $headers);



        $to = $_POST['email'];



        $subject = "Confirmação de envio: Econt Consultoria - Newsletter";



        $headers  = "From: " . $from_name . " <" . $from . ">\r\n";

        $headers .= $bcc;

        $headers .= "Return-Path: <" . $from . ">\r\n";

        $headers .= "Reply-to: <" . $from . ">\r\n";

        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";



                $body  = "Econt Consultoria<br />";

        $body  .= "<font face='arial' size='2'><p>Sua informações foram enviadas com sucesso para a Econt Consultoria</p>";

        $body .= "<b>Econt Consultoria</b></font>";





        @mail($to, $subject, $body, $headers);

      }

		echo '

		<span class="style1"><center>Você foi cadastrado com Sucesso</center></span>';

    }



  }

  else {

  }

?>

<style type="text/css">

<!--

.style1 {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 12px;

}

-->

</style>



