<?php

//VALIDANDO O USUÁRIO

include("valida_login.php");

	print ' <a href="deslogar.php">Deslogar</a>';

	

	//SE NÃO FOR ADMINISTRADOR, REDIRECIONAR

	if($_SESSION["perm"] <> 0){

	header("location:../exibe_produto.php");

	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">



<html>

  <head>

    <title>Sonar Instrumentos - Administra&ccedil;&atilde;o</title>

		<link rel="stylesheet" href="" type="text/css" />

  </head>

  <body>

    <table border="1" align="center" cellpadding="2" cellspacing="2" width="100%">

			<tr>			</tr>

			<tr>

			  <td width="75%" height="99" colspan="2" align="center">

			    

			    <?php

				  if(isset($_GET['pag'])){

				   if( $_GET['pag']==1){

				   	//INCLUDE PARA INCLUIR PRODUTO

				  include("produtos.php");

				  }elseif($_GET['pag']==2){

				  		//INCLUDE PARA LISTAR PRODUTOS

				  include("lista.php");

				  		//INCLUDE PARA CADASTRAR CATEGORIA

					   }elseif($_GET['pag']==3){

					  include("cadcategoria_form.php");

					  //INCLUDE PARA EXIBIR USUÁRIOS

					  	 }elseif($_GET['pag']==4){

					  include("exibe_categoria.php");

					  //INCLUDE PARA CADASTRAR USUÁRIO

					    }elseif($_GET['pag']==5){

					  include("form_cad_login.php");

					  //INCLUDE PARA EXIBIR USUÁRIO

					  	 }elseif($_GET['pag']==6){

					  include("exibe_usuarios.php");

					  //ALTERAR PRODUTO

					   }elseif($_GET['pag']==7){

					  include("form_upd_produtos.php");

					  }

				 }else{

				  print "Bem vindo Administrador";



				 }

				?>			  </td>

			</tr>

			<tr>

			  <td height="0" colspan="2" align="center">

			  

			  

			  <?php 

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				//mensagens para o usuário

				if($frase ==1){

				print "produto deletado";

				}elseif($frase ==2){

				print "produto e imagem inseridos";

				}elseif($frase ==3){

				print "produto alterado";

				}elseif($frase ==4){

				print "imagem alterada";

				}elseif($frase ==5){

				print "usuário cadastrado";

				}elseif($frase ==6){

				print "login do usuário alterado";

				}elseif($frase ==7){

				print "categoria deletada";

				}elseif($frase ==8){

				print "login deletado";

				}else{

				print "executa alguma operação";

				}



			  }

			  ?>

              <br>

              <a href="../exibe_produto.php">exibir produtos [beta]</a></td>

	  </tr>

			<tr>

        <td colspan="3">

				  <table border="1" width="100%">

            <tr align="center">

              <td colspan="3"><a href="adm.php">P&aacute;gina Inicial - Administra&ccedil;&atilde;o</a></td>

              </tr>

            <tr align="center">

              <td><a href="adm.php?pag=1">Inserir Produtos</a></td>

              <td><a href="adm.php?pag=2">Controle de Produtos</a></td>

            </tr>

            <tr align="center">

              <td><a href="adm.php?pag=3">Inserir Categoria </a></td>

              <td><a href="adm.php?pag=4">Controle de Categorias </a></td>

            </tr>

            <tr align="center">

              <td><a href="adm.php?pag=5">Inserir Usu&aacute;rio</a></td>

			  <td><a href="adm.php?pag=6.php">Controle de Usu&aacute;rios </a></td>

			  </tr>

			 

          </table>		</td>

      </tr>

    </table>

  </body>

</html>

