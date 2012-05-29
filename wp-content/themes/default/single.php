<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						<header>
							<h1 class="page-title">Blog</h1>
						</header>

						<div class="blog-content ninecol clearfix">
					
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							
							<header>
								
								<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
								
								<p class="meta"><?php _e("Postado em", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("por", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&amp;</span> <?php _e("marcado em", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
							
							</header> <!-- end article header -->
						
							<section class="post-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
						
							</section> <!-- end article section -->
							
							<footer>
				
								<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
								
								<?php include 'toolbar-share.php'; ?>
								
							</footer> <!-- end article footer -->
							
							<?php comments_template(); ?>
						
							</article> <!-- end article -->
						
							<?php endwhile; ?>			
							
							<?php else : ?>
							
							<article id="post-not-found">
							    <header>
							    	<h1>Nada encontrado</h1>
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