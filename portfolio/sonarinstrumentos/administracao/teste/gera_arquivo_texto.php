<?php 



// FUN��ES ->

	// FCN PARA CONSISTIR EXTES�O DO ARQUIVO

	function valida_ext($arquivo){

	

		// FAZER A CONSISTECIA DA EXTENS�O DO ARQUIVO

		// ENCONTRA A POSI��O NUMERICA DO PONTO

		$ultimo_ponto = strrpos ($arquivo, ".");

		// VERIFICO SE O VAR DA BUSCA N�O � FALSE

		if ($ultimo_ponto){

			

		    // MEDI O TAMANHO DA STRING

			$tamanho = strlen ($arquivo);

				

			// CONFERE SE O PONTO EST� NA ULTIMA POSI��O DA STRING

			if ($ultimo_ponto == $tamanho - 1){

				

				// CASO O PONTO ESTEJA NA ULTIMA POSI��O, ATRIBUI AUTOMATICAMENTE A EXTENS�O

    			$arquivo .= "txt";

				

			}

			

		}else {

			     

			// CASO N�O ENCONTRE NENHUM PONTO, ATRIBUI AUTOMATICAMENTE A EXTENS�O

			$arquivo .= ".txt";

				

		}



		return $arquivo;

	

	} // END - FCN (valida_ext)

	

	// FCN PARA GRAVA��O DO ARQUIVO

	function grava_arquivo($arquivo, $conteudo){

	

		// ABRINDO O ARQUIVO PARA GRAVA��O

		$abridor = fopen ($arquivo, "a+");

		// ESCREVE O CONTEUDO NO ARQUIVO

		fwrite ($abridor, $conteudo);

		// FECHA O ARQUIVO

		fclose ($abridor);

	

	}

	

//-----------------------------------------------------------------------------------------------

// FIM DAS FUN��ES

//-----------------------------------------------------------------------------------------------



// INICIO DA ROTINA ->



    // VERIFICO SE O BTN FOI CLICADO

	if (isset ($_POST['gera'])){

	

		// VERIFICA SE AS VARs N�O EST�O VAZIAS

		if (!empty ($_POST['arquivo']) && !empty ($_POST['conteudo'])){

		

			// REATRIBUI��O SIMPLES DE VALOR

			$arquivo = $_POST['arquivo'];

			$conteudo = $_POST['conteudo'];

		

			// CHAMADA DA FUN��O DE CONSISTENCIA DE EXTENS�ES

		    $arquivo = valida_ext($arquivo);

			

			// VERIFICAR A EXISTENCIA DO MESMO

			if (file_exists ($arquivo)){

			

				print 

					"<form method=\"post\">

						<table border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"1\">

							<tr>

							  <td><input name=\"sobre\" type=\"submit\" value=\"Sobreescrever\" /></td>

							  <td><label>

									<input name=\"renome\" type=\"submit\" value=\"Diferenciar o nome\" />

									</label>

							  </td>

							  <td><label>

									<input name=\"cancela\" type=\"submit\" value=\"Cancelar a opera&ccedil;&atilde;o\" />

									</label>

							  </td>

							  <td><input name=\"arquivo\" type=\"hidden\" value=\"$arquivo\" />

								  <input name=\"conteudo\" type=\"hidden\" value=\"$conteudo\" /></td>

							  </tr>

						  </table>

					</form>";

			

			}else {

			

				// CHAMA A FCN DE GRAVA��O NO ARQUIVO

				grava_arquivo($arquivo, $conteudo);		

				

			}

		

		}else {

		

		    // EXIBI MSG CASO OS CAMPOS SEJAM VAZIOS

			print "Campos vazios! Preencha os campos.";

		

		}

		

	

	}

	// --------------------------------------------------------------------------------------------------------------------------------

	// 	

	// --------------------------------------------------------------------------------------------------------------------------------



	if (isset ($_POST['sobre'])){



		// REATRIBUI��O SIMPLES DE VALOR

		$arquivo = $_POST['arquivo'];

		$conteudo = $_POST['conteudo'];

	

		// APAGA O ARQUIVO EXISTENTE

		unlink ($arquivo);

		

		// CHAMA A FCN DE GRAVA��O NO ARQUIVO

		grava_arquivo($arquivo, $conteudo);		

	

	}elseif (isset ($_POST['renome'])){

	

		// REATRIBUI��O SIMPLES DE VALOR

		$arquivo = $_POST['arquivo'];

		$conteudo = $_POST['conteudo'];

		

		// ENCONTRO A POSI��O DO ULTIMO PONTO

		$ult_pto = strrpos ($arquivo, ".");

		// DESCUBRO O TAMANHO

		$tamanho = strlen ($arquivo);

		// CALCULO DE POSI��ES PARA A EXTENS�O

		$tam_pos = $tamanho - $ult_pto;

		

		// MARCO 1 VAR COM A EXTENS�O DO ARQUIVO

		$ext = substr ($arquivo, $tam_pos * -1);

		

		// MANTEM O RESTANTE DO NOME ARQUIVO NUMA VARIAVEL

		$nome_arquivo = substr ($arquivo, 0, $tam_pos + 1);

		

		// MONTANDO O NOVO NOME, NO EXEMPLO IREI BASEAR O SUFIXO NO DATETIME 

		$novo_nome = $nome_arquivo.date("dmYHis").$ext;

		

		// CHAMA A FCN DE GRAVA��O NO ARQUIVO

		grava_arquivo($novo_nome, $conteudo);		

		

	}elseif(isset ($_POST['cancela'])){

	

		// DESTRU-O AS VARs

		unset ($_POST['arquivo']);

		unset ($_POST['conteudo']);

		

		// REDIRECIONO PARA A PAGINA DE FORMULARIO NOVAMENTE

		header("location:gera_arquivo_texto.php");



	

	}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHP | FATEC :::: Gera Arquivo Texto</title>

</head>



<body>

<form id="form1" name="form1" method="post" action="">

  <table border="0" align="center" cellpadding="2" cellspacing="2">



    <tr>

      <td valign="top">Arquivo</td>

      <td><label>

        <input name="arquivo" type="text" id="arquivo" size="28" />

      </label></td>

    </tr>

    <tr>

      <td valign="top">Conteudo</td>

      <td><label>

        <textarea name="conteudo" cols="25" rows="5" id="conteudo"></textarea>

      </label></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><div align="right">

          <input name="gera" type="submit" id="gera" value="Gerar Arquivo" />

        </div>

     </td>

    </tr>

  </table>

</form>



</body>

</html>

