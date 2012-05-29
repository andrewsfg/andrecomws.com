<?php include("valida_login.php");//VALIDA SE USUÁRIO ESTÁ LOGADO PARA PROSSEGUIR?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" />

<title>..: Sonar Instrumentos - Administra&ccedil;&atilde;o</title>

</head>

<body>



<div id="container">



<div id="topoadm"><a href="index.php"><img src="../imgs/topo.jpg" alt="Painel de Administra&ccedil;&atilde;o" border="0" title="Painel de Administração" /></a></div>





<div id="meioadm">

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - PRODUTOS</h1>

</div>



<div id="contadm"><?php

//VALIDANDO O USUÁRIO

	print "bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar.php">Deslogar</a>';

	

	//SE NÃO FOR ADMINISTRADOR, REDIRECIONAR

	if($_SESSION["perm"] <> 0){

	header("location:../index.php");

	}

?>

</div><div id="paineladm">

  <p>

      <?php

include("conecta.php");

?>

	 <?php include("menu.php");?>

    <p>

      <?php 

			  if(isset($_GET['frase'])){

			  	$frase = $_GET['frase'];

				

				if(isset($_GET['usuario'])){

				$usuario = $_GET['usuario'];

				}

				

				//MENSAGENS PARA EXIBIR AO USUÁRIO

				if($frase ==1){

				print '<p>Aviso: <strong>PRODUTO cadastrado com sucesso.</strong></p>';

			  }elseif($frase==2){

					print '<p>Aviso: <strong>PRODUTO deletado com sucesso.</strong></p>';

					 }elseif($frase==3){

					print '<p>Aviso: <strong>PRODUTO atualizado com sucesso.</strong></p>';						  

					}elseif($frase==4){

					print '<p>Aviso: <strong>IMAGENS atualizadas com sucesso.</strong></p>';						  

					}elseif($frase==5){

					print '<p>Aviso: <strong>PRODUTO agora está INATIVO.</strong></p>';		

					}elseif($frase==6){

					print '<p>Aviso: <strong>PRODUTO destaque principal</p>';						  

					}

					}

//SE O ID DA CATEGORIA FOI SETADO PROSSIGA

if(isset($_GET['cat'])){

	$id_cat = $_GET['cat'];

	if(isset($_GET['subcat'])){

		$id_subcat = $_GET['subcat'];

			 ?>

      

    <a href="form_cad_prod.php?categoria=<?php print $id_cat;?>&amp;subcategoria=<?php print $id_subcat;?>"><img src="../imgs/adm_painel_adicionar.gif" width="20" height="20" hspace="4" /></a><span class="titadm"><a href="form_cad_prod.php?categoria=<?php print $id_cat;?>&subcategoria=<?php print $id_subcat;?>">Inserir novo produto<br />

    </a></span><span class="titadm"><?php

	//PEGAR CATEGORIA E SUBCATEGORIA PARA EXIBIR AO USU&Aacute;RIO

$sel_categoria = "SELECT nome FROM categoria WHERE id_categoria = '$id_cat'";

$q_sel_categoria = mysql_query($sel_categoria);



$r_cat = mysql_fetch_array($q_sel_categoria);

$nome_categoria = $r_cat[0];



$sel_subcategoria = "SELECT nome FROM subcategoria WHERE id_subcat = '$id_subcat'";

$q_sel_subcategoria = mysql_query($sel_subcategoria);



$r_subcat = mysql_fetch_array($q_sel_subcategoria);

$nome_subcategoria = $r_subcat[0];



print "<p><b>".$nome_categoria." > ".$nome_subcategoria."</b></p>";



?></span></p>

    </p>

    <form action="sql_cad_prod.php" method="post">

  <input type="hidden" name="categoria" value="<?php print $id_cat;?>" />

  <input type="hidden" name="subcategoria" value="<?php print $id_subcat;?>" />

<?php



//EXIBE PRODUTOS SE O ID CATEGORIA E SUB CATEGORIA EXISTIREM

$sel_prod ="SELECT * FROM produtos WHERE categoria_id = $id_cat AND subcat_id = $id_subcat";

$q_prod = mysql_query($sel_prod);



if(mysql_num_rows($q_prod) >0){

print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" id="tabela">

  <tr>

  	<td bgcolor="#ECF9FF"><div align="center"><strong>Alterar</strong></div></td>

    <td bgcolor="#ECF9FF"><div align="center"><strong>Imagem pequena</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Status</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Produto</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Preço</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Peso</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Estoque</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Estoque Minimo</strong></div></td>

	<td bgcolor="#ECF9FF"><div align="center"><strong>Alterar Produto</strong></div></td>

	</tr>

	<tr>';

	

	print '

       <select name="funcao" onChange="this.form.submit();">

         <option value="">Opções</option>

         <option value="5">Normal</option>

         <option value="0">Inativo</option>

		 <option value="1">Excluir</option>

         <option value="2">Destaque</option>

         <option value="3">Remover Destaque</option>

         <option value="4">Destaque Principal</option>

       </select>'; 

	}else{

	print "Aviso: Não há produtos cadastrados nessa categoria.";

	}

//SELECT QUE DÁ OPÇÕES DE DELETAR PRODUTO E ALTERAR STATUS







//OBTENDO A IMAGEM DO PRODUTO EXIBIDO

 while($r_prod = mysql_fetch_array($q_prod)){

 

 print' <td><input name="alterar[]" type="checkbox" value="'.$r_prod[0].'"/></td>';

//QUERY PARA BUSCAR A IMAGEM

$sel_img_prod ="SELECT caminho,nome FROM prod_img WHERE id_produto = $r_prod[0] and tipo = 1";

$q_prod_img = mysql_query($sel_img_prod);

	while($r_prod_img = mysql_fetch_array($q_prod_img)){

		$img_pasta = $r_prod_img[0];

		$img_nome = $r_prod_img[1];

	print '<td><img width="100" height="100" src="../'.$img_pasta.''.$img_nome.'"/><br />

	<a href="form_upd_img.php?categoria='.$id_cat.'&subcategoria='.$id_subcat.'&id='.$r_prod[0].'" /><strong>Alterar imagens</strong></a>

	</td>';

		}

		

   

			if($r_prod[8]==0){

			 //0 é PRODUTO INATIVO

			 $desc = "Inativo";

			 }elseif($r_prod[8]==1){

			 $desc = "Normal";

			  }elseif($r_prod[8]==2){

			 $desc = "Destaque";

			   }elseif($r_prod[8]==3){

			 $desc = "Destaque Principal";

			 }else{

			  $desc = "Status Indefinido";

			  }

			  print'

			<td>'.$desc.'</td>

			<td>'.$r_prod[1].'</td>

			<td>R$'.number_format($r_prod[4], 2, ",", ".").'</td>

			<td>'.number_format($r_prod[5],0).'Kg</td>

			<td>'.$r_prod[6].'</td>

			<td>'.$r_prod[7].'</td>';

			//recebe o id produto para uma variável

			$idproduto = $r_prod[0];

			//link para alterar o produto e deletar

			print '<td><a href="form_upd_prod.php?categoria='.$id_cat.'&subcategoria='.$id_subcat.'&idproduto='.$idproduto.'"><strong>Alterar Produto</strong></a></td>

			

		</tr>';

   }

   //SE NÃO SETOU CATEGORIA REDIRECIONA PARA

   }else{

   header("location:exibe_categoria.php");

   }

   }

   

?>

</table>

</form>



  <br />

  <a href="exibe_subcategoria.php?idcategoria=<?php print $id_cat; ?>">Voltar

    

  </p>

  </a></div>



</div>



</div>







</body>

</html>

