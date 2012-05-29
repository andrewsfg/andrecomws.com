<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						<header>
							<h1 class="page-title">Blog</h1>
						</header>

						<div class="blog-content ninecol clearfix">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
								
								<header>
									
									<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									
									<p class="meta"><?php _e("Postado em", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F j, Y'); ?></time> <?php _e("por", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&amp;</span> <?php _e("em", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
									
								</header> <!-- end article header -->
							
								<section class="post-content clearfix">
									<?php the_content(_e('', "bonestheme")); ?>
									<div class="clearfix">
										<a href="<?php the_permalink() ?>" class="button" title="Leia mais">Leia mais</a>
									</div>
								</section> <!-- end article section -->
								
								<footer>
									
									<p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>
									
									<?php include 'toolbar-share.php'; ?>
								</footer> <!-- end article footer -->
							
							</article> <!-- end article -->
						
							<?php comments_template(); ?>
						
							<?php endwhile; ?>	
						
							<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
							
							<?php page_navi(); // use the page navi function ?>
							
							<?php } else { // if it is disabled, display regular wp prev & next links ?>
								<nav class="wp-prev-next">
									<ul class="clearfix">
										<li class="prev-link"><?php next_posts_link(_e('&laquo; Mais antigas', "bonestheme")) ?></li>
										<li class="next-link"><?php previous_posts_link(_e('Mais novass &raquo;', "bonestheme")) ?></li>
									</ul>
								</nav>
							<?php } ?>		
							
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

						</div> <!-- end blog-content -->

						<?php get_sidebar(); // sidebar 1 ?>

					</div> <!-- end #main -->
    			
    			</div> <!-- #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>