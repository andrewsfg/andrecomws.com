<?php
/*
This is the custom post type taxonomy template.
If you edit the custom taxonomy name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom taxonomy is called
register_taxonomy( 'shoes',
then your single template should be
taxonomy-shoes.php

*/
?>

<?php get_header(); ?>
			
			<div id="content">
				
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						<header>
							
							<h1 class="page-title" itemprop="headline">Portfolio</h1>
							
							<!--<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
						-->
						</header> 
						
											
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					
						<section class="post-content clearfix" itemprop="articleBody">
							<form class="category-choose">
								<fieldset>
									<label>Filtrar por:
										<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
											<option selected="selected">Categoria</option>
											<option value="../todos/" <?php if($_GET['trabalhos'] == 'todos'){?>selected="selected"<?php } ?>>Todos</option>
											<option value="../trabalhos-web/" <?php if($_GET['trabalhos'] == 'web'){?>selected="selected"<?php } ?>>Web</option>
											<option value="../video/" <?php if($_GET['trabalhos'] == 'video'){?>selected="selected"<?php } ?>>Vídeo</option>
											<option value="../design-digital/" <?php if($_GET['trabalhos'] == 'design-digital'){?>selected="selected"<?php } ?>>Design Digital</option>
											<option value="../audio/" <?php if($_GET['trabalhos'] == 'audio'){?>selected="selected"<?php } ?>>Áudio</option>
										</select>
									</label>
								</fieldset>
							</form>

						<div class="clearfix">
							<h2 class="archive_title h2"><?php _e("", "bonestheme"); ?> <?php single_cat_title(); ?></h2>
						</div>
								<ul class="portfolio-list clearfix">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<li class="fourcol">
								<?php the_title( '<h2 class="entry-title text-center">', '</h2>' ); ?>
								<figure><?php the_post_thumbnail( 'bones-thumb-332' ); ?></figure>
								<a href="<?php the_permalink();?>" title="Mais detalhe sobre este trabalho">
									<?php the_title( '<h2 class="entry-title text-center">', '</h2>' ); ?>
									<?php the_excerpt(); ;?>
									<span class="button"> Leia mais</span>
								</a>
								</li>
						
						<?php endwhile; ?>
						</ul>

						<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
					
						<?php } else { // if it is disabled, display regular wp prev & next links ?>
							<nav class="wp-prev-next">
								<ul class="clearfix">
									<li class="prev-link"><?php next_posts_link(_e('&laquo; Anteriores', "bonestheme")) ?></li>
									<li class="next-link"><?php previous_posts_link(_e('Próximas &raquo;', "bonestheme")) ?></li>
								</ul>
							</nav>
						<?php } ?>

						</section> <!-- end article section -->
							
							<footer>
								
							</footer> <!-- end article footer -->
						
						</article> <!-- end article -->
									
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1>Não encontrado</h1>
						    </header>
						    <section class="post-content">
						    	<p>Desculpe, mas o recurso solicitado não foi encontrado neste site.</p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php //get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>