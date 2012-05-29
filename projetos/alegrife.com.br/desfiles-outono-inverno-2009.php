 <?php

/**
 * @author Mauro Pirrone (www.mauropirrone.com)
 * @version 1.0
 */

require_once("phpFlickr/phpFlickr.php");

/**
 * You may get your API key from
 * http://www.flickr.com/services/api/keys
 */
$f = new phpFlickr("a30b8f2f5b7e01b6948e28f6b611bfd7"); 

/**
 * Change this to your photoset id
 *
 * Note that the photoset id is part of the URL
 * For e.g. http://www.flickr.com/photos/26262208@N07/sets/72157605353756648/
 */
$photoset_id = '72157618843916933';

$photos = $f->photosets_getPhotos($photoset_id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alegrife - A Grife da Alegria - Desfiles - Coleção Out/Inv 2009</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
<!-- start campanha imasters -->
<script src="http://imasters.uol.com.br/crossbrowser/fonte.js" type="text/javascript"></script>
<!-- end campanha imasters -->
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="favicon.ico" >
<meta name="editoria" content="Alegrife"/>
<meta name="description" content="A Alegrife precisava ajudar a mamãe a não se sentir limitada entre o alto preço da boa qualidade e o baixo preço da pouca qualidade."/>
<meta name="keywords" content="Alegrife, Coleções, Roupas Infantis, Charme, Mãe, Desfiles, Crianças, Roupas, Moda Infantil" />
</head>

<body>

<?php include("inc/top.php"); ?>

<div id="container">
	<div id="content">
    	<div class="middle-section">
        
        
          <h2 title="Principais Marcas">Desfiles</h2>
          <h3>Coleção Out/Inv 2009-05-21</h3>
            
            <div id="gallery">
	<ul>
		<?php foreach ($photos['photo'] as $photo): ?>
		<li><a rel="lightbox[roadtrip]" href="<?= $f->buildPhotoURL($photo, 'medium') ?>" title="<?= $photo['title'] ?>"><img src="<?= $f->buildPhotoURL($photo, 'square') ?>" alt="<?= $photo['title'] ?>" title="<?= $photo['title'] ?>" /></a></li>
		<?php endforeach; ?>
	</ul>
</div>
      </div>
</div>
</div>
   <?php include("inc/footer.php");?>
   </div>

</body>
</html>
