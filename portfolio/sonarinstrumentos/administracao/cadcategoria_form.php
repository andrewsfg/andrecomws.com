<?php include("valida_login.php");?>

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

  <h1 class="titadm">PAINEL DE ADMINISTRA&Ccedil;&Atilde;O - CATEGORIAS</h1>

</div>



<div id="contadm"><?php

//VALIDANDO O USUÁRIO

	print "bem vindo <b>".$usuario."</b>";

	print ' <a href="deslogar.php">Deslogar</a>';

	

	//SE NÃO FOR ADMINISTRADOR, REDIRECIONAR

	if($_SESSION["perm"] <> 0){

	header("location:../exibe_produto.php");

	}

?>

</div><div id="paineladm">



  <?php include("menu.php");?>

    <p>Inserir Categoria

    <form id="ins_categoria" name="ins_categoria" method="post" action="sql_categoria.php">

      <p>Nome: <input type="hidden" name="categoriapai" value="<?php

	  print $categoria; ?>"/>

        <input type="text" name="nome" />

        <br />

      Ordenamento: 

      <input name="ordem" type="text" id="ordem" />

      <br />

      <input name="bt_cadcategoria" type="submit" id="bt_cadcategoria" value="Gravar" />

      <input name="limpar_categoria" type="reset" id="limpar_categoria" value="Limpar" />

      </p>

  

		<?php 

		include("conecta.php");

		//pegar valores de subcategorias

		$sel_subcategoria = "SELECT id_categoria_pai FROM categoria";

		$q_subcategoria = mysql_query($sel_subcategoria);

		$r_subcategoria = mysql_num_rows($q_subcategoria);

		if($r_subcategoria > 0){

		$categoria_pai = mysql_result ($q_subcategoria, 0, "id_categoria_pai");

		}

		if(isset($_GET['id'])){

		$categoria = $_GET['id'];

			  }else{

		$categoria = 0;

		}



		

		?>

</form>

    

</p>

</div>



</div>



</div>







</body>

</html>

