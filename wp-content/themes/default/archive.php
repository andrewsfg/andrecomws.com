<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						<header>
						<?php if (is_category()) { ?>
							<h1 class="archive-title h2">
								<span><?php _e("Postagens categorizadas:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
							</h1>
						<?php } elseif (is_tag()) { ?> 
							<h1 class="archive-title h2">
								<span><?php _e("Posts Tagueados:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
							</h1>
						<?php } elseif (is_author()) { ?>
							<h1 class="archive-title h2">
								<span><?php _e("Posts por:", "bonestheme"); ?></span> <?php get_the_author_meta('display_name'); ?>
							</h1>
						<?php } elseif (is_day()) { ?>
							<h1 class="archive-title h2">
								<span><?php _e("Arquivos diários:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
							</h1>
						<?php } elseif (is_month()) { ?>
						    <h1 class="archive-title h2">
						    	<span><?php _e("Arquivos mensais:", "bonestheme"); ?>:</span> <?php the_time('F Y'); ?>
						    </h1>
						<?php } elseif (is_year()) { ?>
						    <h1 class="archive-title h2">
						    	<span><?php _e("Arquivos por ano:", "bonestheme"); ?>:</span> <?php the_time('Y'); ?>
						    </h1>
						<?php } ?>
						</header>

						<div class="blog-content ninecol clearfix">
					
						
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
								
								<header>
									
									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
									<p class="meta"><?php _e("Postado em", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("por", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&amp;</span> <?php _e("marcado em", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
								
								</header> <!-- end article header -->
							
								<section class="post-content">
								
									<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
								
									<?php the_excerpt(); ?>
							
								</section> <!-- end article section -->
								
								<footer>
									
								</footer> <!-- end article footer -->
							
							</article> <!-- end article -->
							
							<?php endwhile; ?>	
							
							<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
								
								<?php page_navi(); // use the page navi function ?>
						
							<?php } else { // if it is disabled, display regular wp prev & next links ?>
								<nav class="wp-prev-next">
									<ul class="clearfix">
										<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
										<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
									</ul>
								</nav>
							<?php } ?>
										
							
							<?php else : ?>
							
							<article id="post-not-found">
							    <header>
							    	<h1><?php _e("Nada encontrado", "bonestheme"); ?></h1>
							    </header>
							    <section class="post-content">
							    	<p><?php _e("Desculpe, o que você estava procurando não está aqui.", "bonestheme"); ?></p>
							    </section>
							    <footer>
							    </footer>
							</article>
							
							<?php endif; ?>
						
						</div> <!-- end .blog-content -->
	    				
						<?php get_sidebar(); // sidebar 1 ?>

					</div> <!-- end #main -->
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>