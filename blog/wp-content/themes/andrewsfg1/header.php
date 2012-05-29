<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>



<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<?php wp_head(); ?>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

</head>

<body>

<div id="page">

	<div id="header">

    <div id="header-left"></div>

    <div id="header-right"></div>

</div>

	<div id="menu">

		<ul id="nav">

	  <li class="page_item"><a href="<?php echo get_settings('home'); ?>/" title="Home">Home</a></li><?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>

		</ul>

     <!-- fim - esse cara � o menu -->

</div>

  <!--/header -->

