<?php
if (!empty($_POST)){

  $name = $_POST["name"];
  $comment = $_POST["message"];

  //validate email
  if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $email = $_POST["email"];
  }else{
    die('e-mail obrigatório');
  }

  if (($name == "") || ($email == ""))  {
    echo "Atencao! Todos os campos do formulário devem ser preenchidos."; 
  }else{
    $to      = 'andrewsfg@gmail.com';
    $subject = 'Andrews F.G - Mensagem (Formulário de contato)';
    $message = "Nome: <b>$name</b> <br /> E-mail: <b>$email</b><br />";
    $message .= "Data de envio: " . date('r');
    if($message != ''){
      $message .= "<br><br>Mensagem: <br><br>" . '"' . $comment . '"';
    }

    $to = 'andrewsfg@gmail.com';
    $headers = "From: $email\r\n" . 
            'X-Mailer: PHP/' . phpversion() . "\r\n" . 
            "MIME-Version: 1.0\r\n" . 
            "Content-Type: text/html; charset=utf-8\r\n" . 
            "Content-Transfer-Encoding: 8bit\r\n\r\n"; 

    mail($to, $subject, $message, $headers);
    header("Location: contato-obrigado.html");
  }

}else{
  die("don't make this, fucker");
}
?>
                