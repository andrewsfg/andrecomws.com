<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						<header>
							<h1 class="archive-title"><span>Resultados da busca por:</span> <?php echo esc_attr(get_search_query()); ?></h1>
						</header>
						
						<div class="blog-content ninecol clearfix">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
							
							<header>
								
								<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<p class="meta"><?php _e("Postado por", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("por", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&amp;</span> <?php _e("marcado em", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
							
							</header> <!-- end article header -->
						
							<section class="post-content">
								<?php the_excerpt('<span class="read-more">Leia mais em "'.the_title('', '', false).'" &raquo;</span>'); ?>
						
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
									<li class="prev-link"><?php next_posts_link(_e('&laquo; Antigas', "bonestheme")) ?></li>
									<li class="next-link"><?php previous_posts_link(_e('Mais antigas &raquo;', "bonestheme")) ?></li>
								</ul>
							</nav>
						<?php } ?>			
						
						<?php else : ?>
						
						<!-- this area shows up if there are no results -->
						
						<article id="post-not-found">
						    <header>
						    	<h1>Nenhum resultado encontrado</h1>
						    </header>
						    <section class="post-content">
						    	<p>Desculpe, mas o recurso solicitado não foi encontrado neste site.</p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>

					</div>	<!-- end blog-content -->				

					 <div id="sidebar1" class="sidebar threecol last">
    					
    					<?php get_search_form(); ?>
    				
    				</div>

					</div> <!-- end #main -->
    				
    			</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>