<?php 

ob_start();

//esse endereço deve ser editado com o caminho onde esta o css

$arquivo = "../style.css";

//se o botão de alteração for setado ele entra no if que grava no arquivo css

if(isset($_POST['subA'])){

   

   $conversa = $_POST['editor'];

   $gravar = fopen($arquivo, "w");

   fwrite($gravar,$conversa);



   header("location:edita_css.php?frase=1");

}

//se o botão de restauração do css for setado ele entra nesse if que reatribui o back-up ao css atual

    elseif(isset($_POST['subB'])){

	//esse endereço deve ser editado com o caminho onde esta o css copia do original

		$original = "../style2.css";

    $abre = fopen($original, "r");

    $ler = fread($abre, filesize($original));

		

	 $conversa = $ler;

   $gravar = fopen($arquivo, "w");

   fwrite($gravar,$conversa);

		header("location:edita_css.php?frase=2");

     }

		elseif(isset($_POST['subC'])){

      print"Editarei opções de data Para resgatar o css.<a href=\"edita_css.php\">voltar</a>";

     }







?>





